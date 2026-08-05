<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <title>Ma Tontine- Connexion</title>
</head>
<body class="text-slate-950 min-h-dvh">

   <main class="min-h-dvh flex items-center justify-center">
    <div class="max-w-2xl mx-auto px-6 md:px-0">
        <div class="mb-12">
            <h1 class="text-4xl mb-3">Connecter-vous !</h1>
        </div>

        <form action="" method="post">
            <div class="mb-4">
                <div class="flex flex-col mb-4">
                    <label for="phone_number" class="mb-1">Numéro de téléphone</label>
                    <input 
                        type="tel" 
                        name="phone_number" 
                        id="phone_number"
                        class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                </div>

                <div class="flex flex-col mb-3">
                    <label for="code" class="mb-1">Code PIN</label>
                    <input 
                        type="tel" 
                        name="code" 
                        id="code" 
                        maxlength="4"
                        class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                    >
                </div>
            </div>

            <button 
                type="submit" 
                class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                Se connecter
            </button>

            <div class="mt-6">
                <p class="text-center sm:text-start">Vous n'êtes pas encore membre ? <a href="../index.php" class="text-purple-800 underline">Rejoingnez la tontine !</a></p>
            </div>
        </form>
    </div>
   </main>
    
</body>
</html>