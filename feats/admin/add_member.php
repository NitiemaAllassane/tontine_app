<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');
include('../../includes/functions.php');

requireLogin('admin');

$fullName = $_POST['full_name'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$member_photo = $_FILES['photo'] ?? null;

$errors = [];

if (
    trim($fullName) !== "" &&
    trim($phone_number) !== ""
) {

    if (strlen($fullName) < 2) {
        $errors['full_name'] = "Nom trop court";
    }

    if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
        $errors['phone_number'] = "Le numero doit contenir exactement 10 chiffres";
    }

    $checkQuery = $pdo_connexion->prepare("SELECT member_id FROM member WHERE phone = :phone");
    $checkQuery->execute(["phone" => $phone_number]);

    if ($checkQuery->fetch()) {
        $errors['phone_number'] = "Ce numéro est déjà utilisé par un compte existant";
    }

    $uploadResult = uploadImage($member_photo, '../../uploads');
    if (!$uploadResult['success']) {
        $errors['photo'] = $uploadResult['error'];
    }
    $photoFilename = $uploadResult['filename'];

} else {
    $errors['global'] = "Veuillez remplir tous les champs obligatoires";
}

if (empty($errors)) {

    $insertQuery = "INSERT INTO member 
        (full_name, phone, photo, role, created_at)
        VALUES (:full_name, :phone, :photo, :role, :created_at)
    ";

    try {
        $prepareQuery = $pdo_connexion->prepare($insertQuery);
        $prepareQuery->execute([
            "full_name" => $fullName,
            "phone" => $phone_number,
            "photo" => $photoFilename,
            "role" => 'member',
            "created_at" => date('Y-m-d H:i:s'),
        ]);

        $_SESSION['success'] = "Le membre {$fullName} a été ajouté avec succès";
        header('Location: ../../pages/add_member.php');
        exit;

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['errors'] = ['global' => "Une erreur est survenue, veuillez réessayer"];
        header('Location: ../../pages/add_member.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'full_name' => $fullName,
        'phone_number' => $phone_number,
    ];

    header('Location: ../../pages/add_member.php');
    exit;
}

?>