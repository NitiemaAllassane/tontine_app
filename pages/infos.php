<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

try {
    $stmt = $pdo_connexion->prepare("SELECT full_name, phone, photo, role FROM member WHERE member_id = :id");
    $stmt->execute(["id" => $_SESSION['LOGGED']['id']]);
    $admin = $stmt->fetch();

    if (!$admin) {
        session_destroy();
        header('Location: ../../pages/connexion.php');
        exit;
    }
} catch (PDOException $e) {
    error_log($e->getMessage()); // pour toi, en debug
    die("Erreur lors de la récupération des données de l'admin");
}


$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']);

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
        <div class="flex flex-col md:flex-row gap-x-24 min-h-dvh">
            <div class="py-12 h-full md:sticky md:top-6">
                <?php include('../includes/sidebar.php'); ?>
            </div>

            <section class="py-12 flex-1">
                <h2 class="text-2xl mb-12">Informations personnelles</h2>

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
                    <form action="../feats/admin/edit_admin_infos.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4">

                            <input 
                                type="hidden" 
                                name="admin_id" 
                                value="<?php echo $_SESSION['LOGGED']['id']; ?>"
                            >

                            <div class="mb-6 flex flex-col">
                                <label for="photo" class="flex items-center gap-4 cursor-pointer">
                                    <?php if(isset($admin['photo'])): ?>
                                        <figure class="w-24 h-24 overflow-hidden rounded-full relative p-2 bg-purple-800">
                                            <img class="w-full h-full object-cover rounded-full" src="../uploads/<?php echo $admin['photo'] ?>" alt="<?php echo 'Image de ' . $admin['full_name'] ?>">
                                        </figure>
                                    <?php else: ?>
                                        <?php include('../includes/image_placeholder.php'); ?>
                                    <?php endif; ?>

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
                                    value="<?php echo htmlspecialchars($admin['full_name']);  ?>"
                                    class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                                >
                            </div>

                            <div class="flex flex-col mb-4">
                                <label for="phone_number" class="mb-1">Numéro de téléphone</label>
                                <input 
                                    type="tel" 
                                    name="phone_number" 
                                    id="phone_number"
                                    value="<?php echo htmlspecialchars($admin['phone']);  ?>"
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