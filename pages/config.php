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
                <h2 class="text-2xl mb-6">Configurer le temps de votre tontine</h2>

                <form action="" method="post">
                    <div class="mb-4">
                        <div class="mb-6 flex flex-col">
                            <label for="weeks" class="mb-1">Nombre semaines</label>
                            <input 
                                type="number"
                                name="weeks" 
                                id="weeks"
                                value="4"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                        </div> 
                    </div>

                    <button 
                        type="submit" 
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                        Enregistrer les semaines
                    </button>
                    
                </form>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>