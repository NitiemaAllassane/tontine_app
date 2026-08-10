<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');
include('../../includes/functions.php');

requireLogin('admin');

$member_id = $_POST['member_id'] ?? '';
$fullName = $_POST['full_name'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$new_photo = $_FILES['photo'] ?? null;

$errors = [];

// Vérifier que le membre existe et récupérer sa photo actuelle
if (!ctype_digit((string)$member_id)) {
    header('Location: ../../pages/members.php');
    exit;
}

$checkMember = $pdo_connexion->prepare("SELECT photo FROM member WHERE member_id = :id");
$checkMember->execute(["id" => $member_id]);
$existingMember = $checkMember->fetch();

if (!$existingMember) {
    header('Location: ../../pages/members.php');
    exit;
}

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

    // Vérifier l'unicité du numéro, en excluant le membre actuel
    $checkPhone = $pdo_connexion->prepare("
        SELECT member_id FROM member 
        WHERE phone = :phone AND member_id != :member_id
    ");
    $checkPhone->execute([
        "phone" => $phone_number,
        "member_id" => $member_id,
    ]);

    if ($checkPhone->fetch()) {
        $errors['phone_number'] = "Ce numéro est déjà utilisé par un autre compte";
    }

    // Gérer la photo : uniquement si une nouvelle est fournie
    $newPhotoFilename = null;
    $uploadResult = uploadImage($new_photo, '../../uploads');
    if (!$uploadResult['success']) {
        $errors['photo'] = $uploadResult['error'];
    } elseif ($uploadResult['filename'] !== null) {
        $newPhotoFilename = $uploadResult['filename'];
    }

} else {
    $errors['global'] = "Veuillez remplir tous les champs obligatoires";
}

if (empty($errors)) {
    try {
        if ($newPhotoFilename !== null) {
            // Nouvelle photo fournie : on met à jour la colonne photo
            $updateQuery = "UPDATE member 
                SET full_name = :full_name, phone = :phone, photo = :photo 
                WHERE member_id = :member_id
            ";
            $params = [
                "full_name" => $fullName,
                "phone" => $phone_number,
                "photo" => $newPhotoFilename,
                "member_id" => $member_id,
            ];
        } else {
            // Pas de nouvelle photo : on laisse la colonne photo inchangée
            $updateQuery = "UPDATE member 
                SET full_name = :full_name, phone = :phone 
                WHERE member_id = :member_id
            ";
            $params = [
                "full_name" => $fullName,
                "phone" => $phone_number,
                "member_id" => $member_id,
            ];
        }

        $stmt = $pdo_connexion->prepare($updateQuery);
        $stmt->execute($params);

        // Supprimer l'ancien fichier photo du serveur si elle a été remplacée
        if ($newPhotoFilename !== null && $existingMember['photo']) {
            $oldPhotoPath = '../../uploads/' . $existingMember['photo'];
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        $_SESSION['success'] = "Le membre a été modifié avec succès";
        header('Location: ../../pages/edit_member.php?id=' . $member_id);
        exit;

    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['errors'] = ['global' => "Une erreur est survenue, veuillez réessayer"];
        header('Location: ../../pages/edit_member.php?id=' . $member_id);
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'full_name' => $fullName,
        'phone_number' => $phone_number,
    ];

    header('Location: ../../pages/edit_member.php?id=' . $member_id);
    exit;
}
?>