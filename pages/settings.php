<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
unset($_SESSION['errors'], $_SESSION['success']);
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
                <h2 class="text-2xl mb-12">Parametres</h2>

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

                <div>
                    <form action="../feats/admin/change_pin.php" method="post" class="border border-gray-500 w-full p-6 rounded-md mb-12">
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
                                    autocomplete="off"
                                    class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                                >
                                <?php if (isset($errors['current_code'])): ?>
                                    <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['current_code']); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="flex flex-col mb-3">
                                <label for="new_code" class="mb-1">Nouveau Code PIN</label>
                                <input 
                                    type="tel" 
                                    name="new_code" 
                                    id="new_code" 
                                    maxlength="4"
                                    autocomplete="off"
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
                                    autocomplete="off"
                                    class="border-2 border-slate-500 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                                >
                                <?php if (isset($errors['new_code'])): ?>
                                    <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['new_code']); ?></p>
                                <?php endif; ?>
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


                    <!-- Réinitialisation de la tontine -->
                    <form action="../feats/admin/reset_tontine.php" method="post" class="border border-gray-500 w-full p-6 rounded-md mb-12">
                        <h3 class="flex items-center gap-2 mb-6 text-red-600 font-semibold">
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
                                class="lucide lucide-rotate-ccw-icon lucide-rotate-ccw">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                                <path d="M3 3v5h5"/>
                            </svg>
                            Réinitialisation de la tontine
                        </h3>

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
                                class="lucide lucide-triangle-alert-icon lucide-triangle-alert">
                                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                                <path d="M12 9v4"/>
                                <path d="M12 17h.01"/>
                            </svg>
                            <p class="text-gray-500">Cette action est irréversible. Toutes les semaines et tous les paiements enregistrés seront définitivement supprimés. Les membres inscrits ne seront pas affectés.</p>
                        </div>

                        <button 
                            type="submit" 
                            onclick="return confirm('Voulez-vous vraiment réinitialiser la tontine ? Toutes les semaines et tous les paiements seront supprimés définitivement.');"
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
                                class="lucide lucide-rotate-ccw-icon lucide-rotate-ccw">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                                <path d="M3 3v5h5"/>
                            </svg>
                            Réinitialiser la tontine
                        </button>
                    </form>


                    <!-- Zone Danger -->
                    <form action="../feats/admin/delete_member.php" method="post" class="border border-gray-500 w-full p-6 rounded-md">
                        <h3 class="text-red-600 font-semibold mb-4">Zone Danger</h3>

                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION['LOGGED']['id']); ?>">

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
                            onclick="return confirm('Voulez-vous vraiment supprimer définitivement votre compte administrateur ?');"
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