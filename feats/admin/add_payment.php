<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

$member_id = $_POST['member_id'] ?? '';
$week_id = $_POST['week_id'] ?? '';
$amount = $_POST['amount'] ?? '';
$date = $_POST['date'] ?? '';
$statut = $_POST['statut'] ?? '';


$errors = [];
$allowedStatuts = ['paid', 'pending', 'unpaid'];

// Vérifier que le membre existe
if (trim($member_id) === '' || !ctype_digit((string)$member_id)) {
    $errors['member_id'] = "Veuillez sélectionner un membre";
} else {
    $checkMember = $pdo_connexion->prepare("SELECT member_id FROM member WHERE member_id = :id");
    $checkMember->execute(["id" => $member_id]);
    if (!$checkMember->fetch()) {
        $errors['member_id'] = "Ce membre n'existe pas";
    }
}


// Vérifier que la semaine existe
if (trim($week_id) === '' || !ctype_digit((string)$week_id)) {
    $errors['week_id'] = "Veuillez sélectionner une semaine";
} else {
    $checkWeek = $pdo_connexion->prepare("SELECT week_id FROM week WHERE week_id = :id");
    $checkWeek->execute(["id" => $week_id]);
    if (!$checkWeek->fetch()) {
        $errors['week_id'] = "Cette semaine n'existe pas";
    }
}

// Vérifier le montant
if (trim($amount) === '' || !is_numeric($amount) || (float)$amount <= 0) {
    $errors['amount'] = "Veuillez entrer un montant valide";
}

// Vérifier la date
$dateObj = DateTime::createFromFormat('Y-m-d', $date);
if (!$dateObj) {
    $errors['date'] = "Veuillez entrer une date valide";
}

// Vérifier le statut
if (!in_array($statut, $allowedStatuts, true)) {
    $errors['statut'] = "Veuillez sélectionner un statut valide";
}

if (empty($errors)) {
    try {
        $insertQuery = "INSERT INTO payment 
            (member_id, week_id, amount, created_at, status)
            VALUES (:member_id, :week_id, :amount, :created_at, :status)
        ";

        $stmt = $pdo_connexion->prepare($insertQuery);
        $stmt->execute([
            "member_id" => $member_id,
            "week_id" => $week_id,
            "amount" => $amount,
            "created_at" => $date,
            "status" => $statut,
        ]);

        $_SESSION['success'] = "Le paiement a été enregistré avec succès";
        header('Location: ../../pages/add_payment.php');
        exit;

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['errors'] = ['global' => "Une erreur est survenue, veuillez réessayer"];
        header('Location: ../../pages/add_payment.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'member_id' => $member_id,
        'week_id' => $week_id,
        'amount' => $amount,
        'date' => $date,
        'statut' => $statut,
    ];

    header('Location: ../../pages/add_payment.php');
    exit;
}
?>