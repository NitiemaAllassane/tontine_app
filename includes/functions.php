<?php
/**
 * Upload une image en la validant (type, taille).
 * Retourne un tableau ['success' => bool, 'error' => string|null, 'filename' => string|null]
 */


function uploadImage(
    array $file, 
    string $uploadDir, 
    int $maxSizeMo = 2, 
    array $allowedTypes = ['image/jpeg', 'image/png', 'image/webp']
): array
{
    // Vérifie qu'un fichier a réellement été envoyé
    if ($file['error'] === UPLOAD_ERR_NO_FILE) {
        return ['success' => true, 'error' => null, 'filename' => null];
    }

    // Vérifie qu'il n'y a pas d'erreur d'upload (taille serveur dépassée, upload partiel, etc.)
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => "Erreur lors de l'envoi du fichier", 'filename' => null];
    }

    // Vérifie la taille
    $maxSizeOctets = $maxSizeMo * 1024 * 1024;
    if ($file['size'] > $maxSizeOctets) {
        return ['success' => false, 'error' => "L'image ne doit pas dépasser {$maxSizeMo} Mo", 'filename' => null];
    }

    // Vérifie le vrai type MIME (ne jamais se fier à $file['type'], facilement falsifiable)
    $mimeType = mime_content_type($file['tmp_name']);
    if (!in_array($mimeType, $allowedTypes, true)) {
        return ['success' => false, 'error' => "Le fichier doit être une image (jpeg, png ou webp)", 'filename' => null];
    }

    // Génère un nom de fichier unique pour éviter les collisions/écrasements
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueName = uniqid('img_', true) . '.' . $extension;
    $destination = rtrim($uploadDir, '/') . '/' . $uniqueName;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return ['success' => false, 'error' => "Impossible d'enregistrer le fichier", 'filename' => null];
    }

    return ['success' => true, 'error' => null, 'filename' => $uniqueName];
}


?>