<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

$member_id = $_POST['id'] ?? '';

if (!ctype_digit((string)$member_id)) {
    header('Location: ../../pages/members.php');
    exit;
}

$checkMember = $pdo_connexion->prepare("
    SELECT member_id, role FROM member 
    WHERE member_id = :id AND deleted_at IS NULL
");
$checkMember->execute(["id" => $member_id]);
$targetMember = $checkMember->fetch();

if (!$targetMember) {
    $_SESSION['errors'] = ['global' => "Ce membre n'existe pas ou a déjà été supprimé"];
    header('Location: ../../pages/members.php');
    exit;
}

if ($targetMember['role'] === 'admin') {

    // Un admin ne peut supprimer que lui-même
    if ((int)$targetMember['member_id'] !== (int)$_SESSION['LOGGED']['id']) {
        $_SESSION['errors'] = ['global' => "Vous ne pouvez pas supprimer le compte d'un autre administrateur"];
        header('Location: ../../pages/members.php');
        exit;
    }

    // Empêcher la suppression du dernier admin actif
    $countAdmins = $pdo_connexion->query("
        SELECT COUNT(*) FROM member 
        WHERE role = 'admin' AND deleted_at IS NULL
    ")->fetchColumn();

    if ((int)$countAdmins <= 1) {
        $_SESSION['errors'] = ['global' => "Vous êtes le dernier administrateur, vous ne pouvez pas supprimer votre compte"];
        header('Location: ../../pages/members.php');
        exit;
    }
}

try {
    $deleteQuery = $pdo_connexion->prepare("UPDATE member SET deleted_at = NOW() WHERE member_id = :id");
    $deleteQuery->execute(["id" => $member_id]);

    // Si l'admin vient de se supprimer lui-même, on le déconnecte
    if ((int)$targetMember['member_id'] === (int)$_SESSION['LOGGED']['id']) {
        session_destroy();
        header('Location: ../../pages/connexion.php');
        exit;
    }

    $_SESSION['success'] = "Le membre a été supprimé avec succès";
    header('Location: ../../pages/members.php');
    exit;

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['errors'] = ['global' => "Une erreur est survenue lors de la suppression"];
    header('Location: ../../pages/members.php');
    exit;
}
?>