/**
VERIFIER LE CODE AVANT DE TESTER.
Ce CODE a ete genere par CLAUDE
 */


<?php
// session_start();
// include('../../includes/auth.php');
// include('../../configs/database.php');

// requireLogin('admin');

// if (tontineIsInitialized($pdo_connexion)) {
//     header('Location: ../../pages/profil.php');
//     exit;
// }

// $weeksCount = $_POST['weeks'] ?? '';

// $errors = [];

// if (ctype_digit((string)$weeksCount) && (int)$weeksCount >= 1 && (int)$weeksCount <= 52) {
//     $weeksCount = (int)$weeksCount;
// } else {
//     $errors['weeks'] = "Veuillez entrer un nombre de semaines valide (entre 1 et 52)";
// }

// if (empty($errors)) {
//     try {
//         $pdo_connexion->beginTransaction();

//         $weekStmt = $pdo_connexion->prepare("
//             INSERT INTO week (week_number, start_date, end_date)
//             VALUES (:week_number, :start_date, :end_date)
//         ");

//         $currentStart = new DateTime('today');

//         for ($i = 1; $i <= $weeksCount; $i++) {
//             $currentEnd = (clone $currentStart)->modify('+6 days');

//             $weekStmt->execute([
//                 "week_number" => $i,
//                 "start_date" => $currentStart->format('Y-m-d'),
//                 "end_date" => $currentEnd->format('Y-m-d'),
//             ]);

//             $currentStart = (clone $currentEnd)->modify('+1 day');
//         }

//         $pdo_connexion->commit();

//         header('Location: ../../pages/profil.php');
//         exit;

//     } catch (PDOException $e) {
//         $pdo_connexion->rollBack();
//         error_log($e->getMessage());
//         $_SESSION['errors'] = ['global' => "Une erreur est survenue"];
//         header('Location: ../../pages/configure_weeks.php');
//         exit;
//     }
// } else {
//     $_SESSION['errors'] = $errors;
//     header('Location: ../../pages/configure_weeks.php');
//     exit;
// }