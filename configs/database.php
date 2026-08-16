<?php

$host = "sql309.infinityfree.com";
$db_name = "if0_42671668_tontine_db";
$user_name = "if0_42671668";
$password = "OIcoZoaoRc";

try {
    $pdo_connexion = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8mb4",
        $user_name,
        $password
    );
    $pdo_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Une erreur est survenue. Veuillez réessayer plus tard.");
}
?>