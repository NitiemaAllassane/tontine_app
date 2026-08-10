<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Ma Tontine- Profil</title>
</head>
<body class="text-slate-950 min-h-dvh pt-6">

    <?php include_once('../includes/profil_header.php') ?>

   <main>
    <div class="max-w-6xl mx-auto px-6 xl:px-0">
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="py-12 h-full md:sticky md:top-6">
                <?php include('../includes/sidebar.php'); ?>
            </div>
            
            <section class="py-12 flex-1">
                <h2 class="text-2xl mb-6">Ajouter un nouveau membre</h2>

                <?php if ($success): ?>
                    <p class="bg-green-50 text-green-700 border border-green-200 px-4 py-3 rounded-md mb-6">
                        <?php echo htmlspecialchars($success); ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($errors['global'])): ?>
                    <p class="bg-red-50 text-red-700 border border-red-200 px-4 py-3 rounded-md mb-6">
                        <?php echo htmlspecialchars($errors['global']); ?>
                    </p>
                <?php endif; ?>

                <form action="../feats/admin/add_member.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <div class="flex flex-col mb-4">
                            <label for="full_name" class="mb-1">Nom complet</label>
                            <input 
                                type="text" 
                                name="full_name" 
                                id="full_name"
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
                    </div>

                    <button 
                        type="submit" 
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                        Ajouter le membre
                    </button>
                    
                </form>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>