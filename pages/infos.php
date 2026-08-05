<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Ma Tontine- Profil</title>
</head>
<body class="text-slate-950 min-h-dvh pt-6">

    <header class="border-y border-y-slate-4">
        <div class="max-w-6xl mx-auto py-12 md:py-24 px-6 xl:px-0">
            <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-6">
                <div>
                    <?php include('../includes/image_placeholder.php'); ?>
                </div>
                <div>
                    <h1 class="text-3xl mb-2">Bienvenue, <span class="text-purple-800">Nom Complet</span></h1>
                    <p class="text-gray-600">
                        0799999999
                        (<span class="text-purple-800 text-sm">Administrateur</span>)
                    </p>
                </div>
            </div>
        </div>
    </header>

   <main>
    <div class="max-w-6xl mx-auto px-6 xl:px-0">
        <div class="flex flex-col md:flex-row gap-x-24">
            <div class="py-12 h-full md:sticky md:top-6">
                <?php include('../includes/sidebar.php'); ?>
            </div>
            
            <section class="py-12 flex-1">
                <h2 class="text-2xl mb-12">Informations personnelles</h2>

                <div>
                    <form action="" method="post">
                        <div class="mb-4">

                            <div class="mb-6 flex flex-col">
                                <label for="photo" class="flex items-center gap-4 cursor-pointer">
                                    <figure>
                                        <?php include('../includes/image_placeholder.php') ?>
                                    </figure>

                                    <div>
                                        <h4 class="text-lg">Changer de photo</h4>
                                        <p class="text-sm text-gray-600">JPG, PNG or GIF. Max size 2MB</p>
                                    </div>
                                </label>
                                <input 
                                    type="file" 
                                    name="photo" 
                                    id="photo"
                                    class="hidden"
                                >
                            </div>


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

                            <!-- <div class="flex flex-col mb-3">
                                <label for="code" class="mb-1">Code PIN (4 chiffres)</label>
                                <input 
                                    type="tel" 
                                    name="code" 
                                    id="code" 
                                    maxlength="4"
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
                                    class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                                >
                            </div> -->
                        </div>

                        <button 
                            type="submit" 
                            class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                            Enregistrer les modifications
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
   </main>
    
</body>
</html>