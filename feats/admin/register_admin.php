<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');
include('../../includes/functions.php');

$fullName = $_POST['full_name'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$admin_photo = $_FILES['photo'] ?? null;
$code = $_POST['code'] ?? '';
$code_confirm = $_POST['code_confirm'] ?? '';

$errors = [];
$reactivateId = null;
$existingPhoto = null;

if (
    trim($fullName) !== "" &&
    trim($phone_number) !== "" &&
    trim($code) !== ""
) {

    if (strlen($fullName) < 2) {
        $errors['full_name'] = "Nom trop court";
    }

    if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
        $errors['phone_number'] = "Le numero doit contenir exactement 10 chiffres";
    }

    if (!preg_match('/^[0-9]{4}$/', $code)) {
        $errors['code'] = "Votre code PIN doit contenir exactement 4 chiffres";
    } elseif ($code !== $code_confirm) {
        $errors['code'] = "Les codes PIN ne correspondent pas !";
    }

    // Vérifier le numéro, y compris parmi les comptes supprimés
    $checkQuery = $pdo_connexion->prepare("SELECT member_id, deleted_at, photo FROM member WHERE phone = :phone");
    $checkQuery->execute(["phone" => $phone_number]);
    $existing = $checkQuery->fetch();

    if ($existing) {
        if ($existing['deleted_at'] === null) {
            // Compte actif -> vrai doublon, on bloque
            $errors['phone_number'] = "Ce numéro est déjà utilisé par un compte existant";
        } else {
            // Compte supprimé -> on va le réactiver au lieu d'en créer un nouveau
            $reactivateId = $existing['member_id'];
            $existingPhoto = $existing['photo'];
        }
    }

    // Verifier et uploader le fichier (facultatif)
    $uploadResult = uploadImage($admin_photo, '../../uploads');
    if (!$uploadResult['success']) {
        $errors['photo'] = $uploadResult['error'];
    }
    $photoFilename = $uploadResult['filename'];

} else {
    $errors['global'] = "Veuillez remplir tous les champs obligatoires";
}

if (empty($errors)) {
    $hashedCode = password_hash($code, PASSWORD_DEFAULT);

    try {
        if ($reactivateId !== null) {
            // Réactivation d'un ancien compte supprimé
            $finalPhoto = $photoFilename !== null ? $photoFilename : $existingPhoto;

            $updateQuery = "UPDATE member 
                SET full_name = :full_name, photo = :photo, role = 'admin', 
                    code = :code, deleted_at = NULL
                WHERE member_id = :member_id
            ";
            $stmt = $pdo_connexion->prepare($updateQuery);
            $stmt->execute([
                "full_name" => $fullName,
                "photo" => $finalPhoto,
                "code" => $hashedCode,
                "member_id" => $reactivateId,
            ]);

        } else {
            // Nouvelle inscription classique
            $insertQuery = "INSERT INTO member 
                (full_name, phone, photo, role, code)
                VALUES (:full_name, :phone, :photo, :role, :code)
            ";
            $stmt = $pdo_connexion->prepare($insertQuery);
            $stmt->execute([
                "full_name" => $fullName,
                "phone" => $phone_number,
                "photo" => $photoFilename,
                "role" => 'admin',
                "code" => $hashedCode,
            ]);
        }

        $_SESSION['old'] = [
            'phone_number' => $phone_number,
        ];

        header('Location: ../../pages/connexion.php');
        exit;

    } catch (PDOException $e) {
        error_log($e->getMessage());
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