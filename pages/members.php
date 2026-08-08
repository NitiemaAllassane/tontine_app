<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$query = "SELECT member_id, photo, full_name, phone, role FROM member";

$stmt = $pdo_connexion->prepare($query);
$stmt->execute();
$members = $stmt->fetchAll();
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
                <h2 class="text-2xl mb-6">Liste des membres</h2>

                <div class="flex items-center justify-end mb-4">
                    <a 
                        href="./add_member.php"
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer flex items-center gap-2">
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
                            class="lucide lucide-plus-icon lucide-plus">
                            <path d="M5 12h14"/><path d="M12 5v14"/>
                        </svg>
                        Ajouter un membre
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Photo</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Nom</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Telephone</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Role</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200">

                            <?php if(empty($members)): ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-10">
                                        <div class="text-slate-400 flex items-center justify-center gap-2">
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
                                                class="lucide lucide-circle-off-icon lucide-circle-off">
                                                <path d="m2 2 20 20"/><path d="M8.35 2.69A10 10 0 0 1 21.3 15.65"/>
                                                <path d="M19.08 19.08A10 10 0 1 1 4.92 4.92"/>
                                            </svg>
                                            Aucun membres pour le moment
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($members as $member): ?>
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-slate-700">
                                            <?php if(isset($member['photo'])): ?>
                                                <figure class="w-12 h-12 overflow-hidden rounded-full relative">
                                                    <img 
                                                        src="../uploads/<?php echo htmlspecialchars($member['photo']); ?>" 
                                                        alt="<?php echo 'Image de ' . htmlspecialchars($member['full_name']); ?>" 
                                                        class="w-full h-full object-cover"
                                                    >
                                                </figure>
                                            <?php else: ?>
                                                <figure>
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
                                                        class="lucide lucide-circle-user-round-icon lucide-circle-user-round size-12 text-purple-800">
                                                        <path d="M17.925 20.056a6 6 0 0 0-11.851.001"/><circle cx="12" cy="11" r="4"/>
                                                        <circle cx="12" cy="12" r="10"/>
                                                    </svg>
                                                </figure>
                                            <?php endif;  ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            <?php echo htmlspecialchars($member['full_name']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            <?php echo htmlspecialchars($member['phone']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            <?php echo htmlspecialchars($member['role']); ?>
                                        </td>
                                        <td class="px-6 py-4 flex items-center flex-wrap gap-6">
                                            <a href="" class="underline text-blue-600">Voir</a>
                                            <a href="" class="underline text-red-600">Supprimé</a>
                                            <a href="" class="underline text-yellow-600">Modifier</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>