<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <title>Ma Tontine- Accueil</title>
</head>
<body class="text-slate-950 min-h-dvh">

   <main>
    <div class="max-w-2xl mx-auto pt-12 pb-24 px-6 md:px-0">
        <div class="mb-12">
            <h1 class="text-4xl mb-3">Rejoignez notre tontine !</h1>
            <p class="text-xl">
                Créez votre compte en quelques instants pour suivre 
                vos paiements et participer facilement à la tontine.
            </p>
        </div>

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

                <div class="flex flex-col mb-3">
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
                </div>
            </div>

            <button 
                type="submit" 
                class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                Rejoindre la tontine
            </button>

            <div class="mt-6">
                <p class="text-center sm:text-start">Vous êtes déjà membre ? <a href="./pages/connexion.php" class="text-purple-800 underline">Connectez-vous !</a> pour accéder à votre espace.</p>
            </div>
        </form>


         <!-- <a
            href="./pages/active_compte.php" 
            type="submit" 
            class="bg-pink-600 text-white font-semibold px-3 py-2 
            rounded-full cursor-pointer fixed bottom-6 right-3 md:bottom-12 md:right-36"
            title="Activer mon compte"
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
                class="lucide lucide-user-icon lucide-user size-6 md:size-8">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </a> -->
    </div>
   </main>
    
</body>
</html>