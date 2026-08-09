<?php
session_start();
include('../../configs/database.php');

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

    $sql = "SELECT * FROM week";
    $sqlPrepare = $pdo_connexion->prepare($sql);
    $sqlPrepare->execute();
    $weesks = $sqlPrepare->fetchAll();

    $_SESSION['LOGGED'] = [
        "id" => $member['member_id'],
        "phone" => $phone_number,
        "role" => $member['role'],
    ];

    if (empty($weesks)) {
        header('Location: ../../pages/config.php');
        exit;
    } else {
        header('Location: ../../pages/profil.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    header('Location: ../../pages/connexion.php');
    exit;
}


?>