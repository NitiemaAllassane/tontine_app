<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
unset($_SESSION['errors'], $_SESSION['success']);

$sql = "SELECT COUNT(*) FROM week";
$sqlPrepare = $pdo_connexion->prepare($sql);
$sqlPrepare->execute();
$weekCount = (int) $sqlPrepare->fetchColumn();

if (!tontineIsInitialized($pdo_connexion)) {
    $weekCount = 4;
}

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

                <form action="../feats/admin/create_week.php" method="post">
                    <div class="mb-4">
                        <div class="mb-6 flex flex-col">
                            <label for="weeks" class="mb-1">Nombre semaines</label>
                            <input 
                                type="number"
                                name="weeks" 
                                id="weeks"
                                value="<?php echo htmlspecialchars($weekCount) ?>"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                            <?php if (isset($errors['weeks'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['weeks']); ?></p>
                            <?php endif; ?>
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