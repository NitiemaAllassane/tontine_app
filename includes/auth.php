<?php
/**
 * Vérifie si un utilisateur est connecté.
 * Si un rôle est précisé, vérifie aussi que l'utilisateur a bien ce rôle.
 *
 * @param string|null $requiredRole Rôle attendu (ex: 'admin'), ou null pour juste vérifier la connexion
 * @return bool
 */


function isLoggedIn(?string $requiredRole = null): bool
{
    if (!isset($_SESSION['LOGGED'])) {
        return false;
    }

    if ($requiredRole !== null && $_SESSION['LOGGED']['role'] !== $requiredRole) {
        return false;
    }

    return true;
}



/**
 * Protège une page : redirige si l'utilisateur n'est pas connecté (ou n'a pas le bon rôle).
 *
 * @param string|null $requiredRole Rôle attendu (ex: 'admin'), ou null pour juste vérifier la connexion
 * @param string $redirectTo Chemin de redirection si non connecté
 */
function requireLogin(?string $requiredRole = null, string $redirectTo = '../../pages/connexion.php'): void
{
    if (!isLoggedIn($requiredRole)) {
        header('Location: ' . $redirectTo);
        exit;
    }
}


?>