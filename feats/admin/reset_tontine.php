<?php
session_start();
include('../../includes/auth.php');
include('../../configs/database.php');

requireLogin('admin');

try {
    $pdo_connexion->beginTransaction();

    // On supprime d'abord les paiements (table enfant), puis les semaines (table parent)
    $pdo_connexion->exec("DELETE FROM payment");
    $pdo_connexion->exec("DELETE FROM week");
    $pdo_connexion->exec("ALTER TABLE payment AUTO_INCREMENT = 1");
    $pdo_connexion->exec("ALTER TABLE week AUTO_INCREMENT = 1");

    $pdo_connexion->commit();

    $_SESSION['success'] = "La tontine a été réinitialisée avec succès";
    header('Location: ../../pages/config.php');
    exit;

} catch (PDOException $e) {
    $pdo_connexion->rollBack();
    error_log($e->getMessage());
    $_SESSION['errors'] = ['global' => "Une erreur est survenue lors de la réinitialisation"];
    header('Location: ../../pages/config.php');
    exit;
}
?>