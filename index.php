<?php
require_once('./configs/database.php');

$message = "";
if ($pdo_connexion) {
    $message = "Connexion reussi !";
} else {
    $message = "Connexion echoué !";
}

?>

<h1>
    <?php echo $message ?>
</h1>