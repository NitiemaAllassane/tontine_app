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
                <h2 class="text-2xl mb-6">Enregistrer un nouveau paiement</h2>

                <form action="" method="post">
                    <div class="mb-4">
                        <div class="flex flex-col mb-4">
                            <label for="members" class="mb-1">Membres</label>

                            <select 
                                name="members" 
                                id="members" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="1">Sectionnez le membre</option>
                                <option value="1">Sali</option>
                                <option value="1">Amadou</option>
                                <option value="1">Tatiana</option>
                                <option value="1">Roger</option>
                                <option value="1">Franck</option>
                            </select>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="week" class="mb-1">Semaines</label>

                            <select 
                                name="week" 
                                id="week" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="1">Sectionnez la semaine</option>
                                <option value="1">Semaine 1</option>
                                <option value="1">Semaine 1</option>
                                <option value="1">Semaine 1</option>
                                <option value="1">Semaine 1</option>
                                <option value="1">Semaine 1</option>
                            </select>
                        </div>

                        <div class="mb-6 flex flex-col">
                            <label for="amount" class="mb-1">Montant</label>
                            <input 
                                type="number" 
                                name="amount" 
                                id="amount"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                        </div>

                        <div class="mb-6 flex flex-col">
                            <label for="date" class="mb-1">Date de paiement</label>
                            <input 
                                type="date" 
                                name="date" 
                                id="date"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="statut" class="mb-1">Statut</label>

                            <select 
                                name="statut" 
                                id="statut" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="1">Sectionnez le status du paiement</option>
                                <option value="1">Payé</option>
                                <option value="1">En cours</option>
                                <option value="1">Non payé</option>
                            </select>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                        Enregistrer le paiement
                    </button>
                    
                </form>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>