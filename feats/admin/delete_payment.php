<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

$payment_id = $_POST['id'] ?? '';

if (!ctype_digit((string)$payment_id)) {
    header('Location: ../../pages/payments.php');
    exit;
}

// Vérifier que le paiement existe avant de tenter la suppression
$checkPayment = $pdo_connexion->prepare("SELECT payment_id FROM payment WHERE payment_id = :id");
$checkPayment->execute(["id" => $payment_id]);

if (!$checkPayment->fetch()) {
    $_SESSION['errors'] = ['global' => "Ce paiement n'existe pas ou a déjà été supprimé"];
    header('Location: ../../pages/payments.php');
    exit;
}

try {
    $deleteQuery = $pdo_connexion->prepare("DELETE FROM payment WHERE payment_id = :id");
    $deleteQuery->execute(["id" => $payment_id]);

    $_SESSION['success'] = "Le paiement a été supprimé avec succès";
    header('Location: ../../pages/payments.php');
    exit;

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['errors'] = ['global' => "Une erreur est survenue lors de la suppression"];
    header('Location: ../../pages/payments.php');
    exit;
}
?>