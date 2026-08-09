<?php
session_start();
include('../../configs/database.php');
include('../../includes/functions.php');

$fullName = $_POST['full_name'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$admin_photo = $_FILES['photo'] ?? null;
$code = $_POST['code'] ?? '';
$code_confirm = $_POST['code_confirm'] ?? '';

$errors = [];


if (
    trim($fullName) !== "" &&
    trim($phone_number) !== "" &&
    trim($code) !== ""
) {

    // Verifier le nom complet
    if (strlen($fullName) < 2) {
        $errors['full_name'] = "Nom trop court";
    }

    // Verification du numero de telephone
    if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
        $errors['phone_number'] = "Le numero doit contenir exactement 10 chiffres";
    }


    // Vérifier si le numéro existe déjà
    $checkQuery = $pdo_connexion->prepare("SELECT member_id FROM member WHERE phone = :phone");
    $checkQuery->execute(["phone" => $phone_number]);

    if ($checkQuery->fetch()) {
        $errors['phone_number'] = "Ce numéro est déjà utilisé par un compte existant";
    }


    // Verification du code
    if (!preg_match('/^[0-9]{4}$/', $code)) {
        $errors['code'] = "Votre code PIN doit contenir exactement 4 chiffres";
    } elseif ($code !== $code_confirm) {
        $errors['code'] = "Les codes PIN ne correspondent pas !";
    }

    // Verifier et uploader le fichier
    $uploadResult = uploadImage($admin_photo, '../../uploads');
    if (!$uploadResult['success']) {
        $errors['photo'] = $uploadResult['error'];
    }
    $photoFilename = $uploadResult['filename'];

} else {
    $errors['global'] = "Veuillez remplir tous les champs obligatoires";
}



// Verification global
if (empty($errors)) {
    $hashedCode = password_hash($code, PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO member 
        (full_name, phone, photo, role, created_at, code)
        VALUES (:full_name, :phone, :photo, :role, :created_at, :code)
    ";

    try {
        $prepareQuery = $pdo_connexion->prepare($insertQuery);
        $prepareQuery->execute([
            "full_name" => $fullName,
            "phone" => $phone_number,
            "photo" => $photoFilename,
            "role" => 'admin',
            "code" => $hashedCode,
            "created_at" => date('Y-m-d H:i:s'),
        ]);


        $_SESSION['old'] = [
            'phone_number' => $phone_number,
        ];

        header('Location: ../../pages/connexion.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['errors'] = ['global' => "Une erreur est survenue, veuillez réessayer"];
        header('Location: ../../index.php');
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'full_name' => $fullName,
        'phone_number' => $phone_number,
    ];

    header('Location: ../../index.php');
    exit;
}


?>