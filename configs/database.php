<?php

$host = "localhost";
$db_name = "tontine_db";
$user_name = "root";
$password = "";

try {
    $pdo_connexion = new PDO(
        "mysql:host=$host;dbname=$db_name;charset=utf8mb4",
        $user_name,
        $password
    );

    $pdo_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

?>