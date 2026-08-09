<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

if (tontineIsInitialized($pdo_connexion)) {
    header('Location: ../../pages/profil.php');
    exit;
}

$weeksCount = $_POST['weeks'] ?? '';

$errors = [];

if (ctype_digit((string)$weeksCount) && (int)$weeksCount >= 1 && (int)$weeksCount <= 52) {
    $weeksCount = (int)$weeksCount;
} else {
    $errors['weeks'] = "Veuillez entrer un nombre de semaines valide (entre 1 et 52)";
}

if (empty($errors)) {
    try {
        $pdo_connexion->beginTransaction();

        $weekStmt = $pdo_connexion->prepare("
            INSERT INTO week (week_number, year)
            VALUES (:week_number, :year)
        ");

        $currentYear = (int)date('Y');

        for ($i = 1; $i <= $weeksCount; $i++) {
            $weekStmt->execute([
                "week_number" => $i,
                "year" => $currentYear,
            ]);
        }

        $pdo_connexion->commit();

        $_SESSION['success'] = "{$weeksCount} semaines ont été créées avec succès";
        header('Location: ../../pages/profil.php');
        exit;

    } catch (PDOException $e) {
        $pdo_connexion->rollBack();
        error_log($e->getMessage());
        $_SESSION['errors'] = ['global' => "Une erreur est survenue"];
        header('Location: ../../pages/config.php');
        exit;
    }
} else {
    $_SESSION['errors'] = $errors;
    header('Location: ../../pages/config.php');
    exit;
}