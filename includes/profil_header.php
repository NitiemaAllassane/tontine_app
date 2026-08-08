<?php

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
    error_log($e->getMessage());
    die("Erreur lors de la récupération des données de l'admin");
}

?>

<header class="border-y border-y-slate-4">
    <div class="max-w-6xl mx-auto py-12 md:py-24 px-6 xl:px-0">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-6">
            <div>
                <?php if(isset($admin['photo'])): ?>
                    <figure class="w-32 h-32 overflow-hidden rounded-full relative p-2 bg-purple-800">
                        <img class="w-full h-full object-cover rounded-full" src="../uploads/<?php echo $admin['photo'] ?>" alt="<?php echo 'Image de ' . $admin['full_name'] ?>">
                    </figure>
                <?php else: ?>
                    <?php include('../includes/image_placeholder.php'); ?>
                <?php endif; ?>
            </div>
            <div>
                <h1 class="text-3xl mb-2">Bienvenue, <span class="text-purple-800">
                    <?php echo htmlspecialchars($admin['full_name']) ?>
                </span></h1>
                <p class="text-gray-600">
                    <?php echo htmlspecialchars($admin['phone']) ?>
                    (<span class="text-purple-800 text-sm">
                        <?php echo htmlspecialchars($admin['role']) ?>
                    </span>)
                </p>
            </div>
        </div>
    </div>
</header>