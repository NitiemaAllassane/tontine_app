<?php
session_start();
include('../../configs/database.php');
include('../../includes/auth.php');

$phone_number = $_POST['phone_number'] ?? '';
$code = $_POST['code'] ?? '';

$errors = [];
$member = null;

if (trim($phone_number) !== "" && trim($code) !== "") {

    $stmt = $pdo_connexion->prepare("SELECT member_id, code, role FROM member WHERE phone = :phone");
    $stmt->execute(["phone" => $phone_number]);
    $member = $stmt->fetch();

    if (!$member || !password_verify($code, $member['code'])) {
        $errors['global'] = "Numéro ou code PIN incorrect";
    }

} else {
    $errors['global'] = "Veuillez remplir tous les champs";
}

// Verification globale
if (empty($errors)) {
    $_SESSION['LOGGED'] = [
        "id" => $member['member_id'],
        "phone" => $phone_number,
        "role" => $member['role'],
    ];


    if (tontineIsInitialized($pdo_connexion)) {
        header('Location: ../../pages/profil.php');
        exit;
    } else {
        header('Location: ../../pages/config.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    header('Location: ../../pages/connexion.php');
    exit;
}


?>