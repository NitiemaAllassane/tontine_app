<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <title>Ma Tontine- Accueil</title>
</head>
<body class="text-slate-950 min-h-dvh">

   <main class="min-h-dvh flex items-center justify-center">
    <div class="max-w-2xl mx-auto pt-6 py-24 px-6 md:px-0">
        <div class="mb-12">
            <h1 class="text-4xl mb-3">Rejoignez notre tontine !</h1>
            <p class="text-xl">
                Renseignez les informations ci-dessous pour créer votre compte et rejoindre la tontine.
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
    </div>
   </main>
    
</body>
</html>