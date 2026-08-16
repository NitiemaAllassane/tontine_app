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

<div class="flex items-center md:hidden sticky top-0 md:static bg-white py-2">
    <button 
        id="sidebar-toggle" 
        type="button"
        class="md:hidden p-2"
        aria-label="Ouvrir le menu"
        aria-expanded="false"
        aria-controls="sidebar-mobile"
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
            class="lucide lucide-menu-icon lucide-menu size-8">
            <path d="M4 12h16"/><path d="M4 6h16"/><path d="M4 18h16"/>
        </svg>
    </button>
    <h3 class="text-lg">Menu</h3>
</div>

<!-- Side bar mobile -->
<div>
    <?php include_once('mobile_sidebar.php'); ?>
</div>



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