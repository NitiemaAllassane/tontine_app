<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');
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

                <form action="" method="post">
                    <div class="mb-4">
                        <div class="flex flex-col mb-4">
                            <label for="full_name" class="mb-1">Nom complet</label>
                            <input 
                                type="text" 
                                name="full_name" 
                                id="full_name"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="phone_number" class="mb-1">Numéro de téléphone</label>
                            <input 
                                type="tel" 
                                name="phone_number" 
                                id="phone_number"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                        </div>

                        <div class="mb-6 flex flex-col">
                            <label for="photo" class="mb-1">Choisir une photo</label>
                            <input 
                                type="file" 
                                name="photo" 
                                id="photo"
                                class="border-dashed border-2 p-6 rounded-md text-center cursor-pointer outline-purple-800"
                            >
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