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
                <h2 class="text-2xl mb-12">Parametres</h2>

                <div>
                    <form action="" method="post" class="border border-gray-500 w-full p-6 rounded-md mb-12">
                        <h3 class="flex items-center gap-2 mb-6">
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="24" 
                                height="24" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="lucide lucide-shield-icon lucide-shield">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 
                                18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 
                                0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                            </svg>
                            Parametres sécurité
                        </h3>
                        <div class="mb-4">

                            <div class="flex flex-col mb-3">
                                <label for="current_code" class="mb-1">Code PIN Actuel (4 chiffres)</label>
                                <input 
                                    type="tel" 
                                    name="current_code" 
                                    id="current_code" 
                                    maxlength="4"
                                    class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                                >
                            </div>

                            <div class="flex flex-col mb-3">
                                <label for="new_code" class="mb-1">Nouveau Code PIN</label>
                                <input 
                                    type="tel" 
                                    name="new_code" 
                                    id="new_code" 
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
                            </div>
                        </div>

                        <button 
                            type="submit" 
                            class="bg-purple-800 text-white font-semibold 
                            px-3 py-2 rounded-sm cursor-pointer flex items-center gap-2"
                        >
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="24" 
                                height="24" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="lucide lucide-key-icon lucide-key">
                                <path d="m15.5 7.5 2.3 2.3a1 1 0 0 0 1.4 0l2.1-2.1a1 
                                1 0 0 0 0-1.4L19 4"/><path d="m21 2-9.6 9.6"/>
                                <circle cx="7.5" cy="15.5" r="5.5"/>
                            </svg>
                            Changer le code PIN
                        </button>
                    </form>

                    <!-- Zone Danger -->
                    <form action="" method="post" class="border border-gray-500 w-full p-6 rounded-md">
                        <h3 class="text-red-600 font-semibold mb-4">Zone Danger</h3>

                        <!-- ! mettre une valeur dans la value -->
                        <input type="hidden" name="id" value="">

                        <div class="flex flex-col sm:flex-row sm:items-center p-3 gap-2 border border-gray-400 rounded-md mb-4">
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="24" 
                                height="24" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="lucide lucide-trash2-icon lucide-trash-2">
                                <path d="M10 11v6"/><path d="M14 11v6"/>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                <path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            </svg>
                            <p class="text-gray-500">Cette action est irréversible. Votre compte sera définitivement supprimé.</p>
                        </div>

                        <button 
                            type="submit" 
                            class="bg-red-600 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer flex items-center gap-2">
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                width="24" 
                                height="24" 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                class="lucide lucide-trash2-icon lucide-trash-2">
                                <path d="M10 11v6"/><path d="M14 11v6"/>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                <path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                            </svg>
                            Supprimer mon compte
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>