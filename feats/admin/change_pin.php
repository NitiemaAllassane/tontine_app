<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

$admin_id = $_SESSION['LOGGED']['id'];

$current_code = $_POST['current_code'] ?? '';
$new_code = $_POST['new_code'] ?? '';
$code_confirm = $_POST['code_confirm'] ?? '';

$errors = [];

if (trim($current_code) === '' || trim($new_code) === '' || trim($code_confirm) === '') {
    $errors['global'] = "Veuillez remplir tous les champs";
} else {

    $stmt = $pdo_connexion->prepare("SELECT code FROM member WHERE member_id = :id");
    $stmt->execute(["id" => $admin_id]);
    $member = $stmt->fetch();

    if (!$member || !password_verify($current_code, $member['code'])) {
        $errors['current_code'] = "Le code PIN actuel est incorrect";
    }

    if (!preg_match('/^[0-9]{4}$/', $new_code)) {
        $errors['new_code'] = "Le nouveau code PIN doit contenir exactement 4 chiffres";
    } elseif ($new_code !== $code_confirm) {
        $errors['new_code'] = "Les codes PIN ne correspondent pas";
    } elseif ($new_code === $current_code) {
        $errors['new_code'] = "Le nouveau code PIN doit être différent de l'ancien";
    }
}

if (empty($errors)) {
    try {
        $hashedCode = password_hash($new_code, PASSWORD_DEFAULT);

        $stmt = $pdo_connexion->prepare("UPDATE member SET code = :code WHERE member_id = :id");
        $stmt->execute([
            "code" => $hashedCode,
            "id" => $admin_id,
        ]);

        $_SESSION['success'] = "Votre code PIN a été modifié avec succès";
        header('Location: ../../pages/settings.php');
        exit;

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['errors'] = ['global' => "Une erreur est survenue, veuillez réessayer"];
        header('Location: ../../pages/settings.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    header('Location: ../../pages/settings.php');
    exit;
}
?>