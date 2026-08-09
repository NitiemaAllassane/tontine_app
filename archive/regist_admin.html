<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Ma Tontine- Admin</title>
</head>
<body class="text-slate-950 min-h-dvh">

   <main>
    <div class="max-w-2xl mx-auto py-24 px-6 md:px-0">
        <div class="mb-12">
            <h1 class="text-4xl mb-3">Bienvenue 👋</h1>
            <p class="text-xl">
                Créons votre compte administrateur pour commencer à gérer votre tontine.
            </p>
        </div>

        <?php if (isset($errors['global'])): ?>
            <p class="text-red-600 mb-4"><?php echo htmlspecialchars($errors['global']); ?></p>
        <?php endif; ?>

        <form action="../feats/admin/register_admin.php" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <div class="flex flex-col mb-4">
                    <label for="full_name" class="mb-1">Nom complet</label>
                    <input 
                        type="text" 
                        name="full_name" 
                        id="full_name"
                        required
                        maxlength="60"
                        value="<?php echo htmlspecialchars($old['full_name'] ?? ''); ?>"
                        class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                    <?php if (isset($errors['full_name'])): ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['full_name']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="phone_number" class="mb-1">Numéro de téléphone</label>
                    <input 
                        type="tel" 
                        name="phone_number" 
                        id="phone_number"
                        required
                        maxlength="10"
                        value="<?php echo htmlspecialchars($old['phone_number'] ?? ''); ?>"
                        class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                    <?php if (isset($errors['phone_number'])): ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['phone_number']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-6 flex flex-col">
                    <label for="photo" class="mb-1">Choisir une photo (facultative)</label>
                    <input 
                        type="file" 
                        name="photo" 
                        id="photo"
                        class="border-dashed border-2 p-6 rounded-md text-center cursor-pointer outline-purple-800"
                    >
                    <?php if (isset($errors['photo'])): ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['photo']); ?></p>
                    <?php endif; ?>
                </div>

                <div class="flex flex-col mb-3">
                    <label for="code" class="mb-1">Code PIN (4 chiffres)</label>
                    <input 
                        type="tel" 
                        name="code" 
                        id="code" 
                        maxlength="4"
                        required
                        class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                </div>

                <div class="flex flex-col">
                    <label for="code_confirm" class="mb-1">Confirmer le code PIN</label>
                    <input 
                        type="tel" 
                        name="code_confirm" 
                        id="code_confirm" 
                        maxlength="4"
                        required
                        class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                    <?php if (isset($errors['code'])): ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['code']); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <button 
                type="submit" 
                class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                Créer mon compte administrateur
            </button>

            <!-- <div class="mt-6">
                <p class="text-center sm:text-start">Vous êtes déjà membre ? <a href="./connexion.php" class="text-purple-800 underline">Connectez-vous !</a> pour accéder à votre espace.</p>
            </div> -->
        </form>
    </div>
   </main>
    
</body>
</html>