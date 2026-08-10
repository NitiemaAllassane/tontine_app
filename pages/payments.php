<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$query = "SELECT 
    P.payment_id, 
    m.full_name, 
    w.week_number, 
    p.amount, 
    p.created_at AS payment_date, 
    p.status
FROM payment p
JOIN member m ON p.member_id = m.member_id
JOIN week w ON p.week_id = w.week_id
ORDER BY p.created_at DESC, w.week_number DESC";

$stmt = $pdo_connexion->query($query);
$payments = $stmt->fetchAll();
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
                <h2 class="text-2xl mb-12">Paiements des membres</h2>

                <div class="flex items-center justify-end mb-4">
                    <a 
                        href="./add_payment.php"
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
                        Enregistrer un paiement
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-sm">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Membre</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Semaine</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Montant</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Date</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Statut</th>
                                <th class="text-left font-medium text-slate-500 uppercase text-xs tracking-wide px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200">

                            <?php if(empty($payments)): ?>
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
                                            Aucun paiement enregistré pour le moment
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($payments as $payment): ?>
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-slate-700">
                                            <?php echo htmlspecialchars($payment['full_name']) ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            Semaine
                                            <?php echo htmlspecialchars($payment['week_number']) ?>
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            <?php echo htmlspecialchars($payment['amount']) ?>fcfa
                                        </td>
                                        <td class="px-6 py-4 text-slate-600">
                                            <?php echo htmlspecialchars($payment['payment_date']) ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php if ($payment['status'] === 'paid'): ?>
                                                <?php include('../includes/checked.php'); ?>
                                            <?php elseif ($payment['status'] === 'pending'): ?>
                                                <?php include('../includes/pending.php'); ?>
                                            <?php else: ?>
                                                <?php include('../includes/failed.php'); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 flex items-center gap-4">
                                            <!-- <a href="" class="underline text-blue-600">Voir</a> -->
                                            <a href="./edit_payment.php?id=<?php echo htmlspecialchars($payment['payment_id']) ?>" class="underline text-yellow-600">Modifier</a>
                                            <a href="./delete_payment.php?id=<?php echo htmlspecialchars($payment['payment_id']) ?>" class="underline text-red-600">Supprimé</a>
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