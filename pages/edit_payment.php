<?php
session_start();
include('../includes/auth.php');
include('../configs/database.php');

requireLogin('admin');

$payment_id = $_POST['id'] ?? '';

if (!ctype_digit((string)$payment_id)) {
    header('Location: ../pages/payments.php');
    exit;
}

// Récupérer le paiement existant
$stmt = $pdo_connexion->prepare("
    SELECT payment_id, member_id, week_id, amount, created_at, status 
    FROM payment 
    WHERE payment_id = :id
");
$stmt->execute(["id" => $payment_id]);
$payment = $stmt->fetch();

if (!$payment) {
    header('Location: ../pages/payments.php');
    exit;
}

$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
$old = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['success'], $_SESSION['old']);

// Priorité aux valeurs de session (retour d'erreur), sinon valeurs actuelles en base
$memberIdValue = $old['member_id'] ?? $payment['member_id'];
$weekIdValue = $old['week_id'] ?? $payment['week_id'];
$amountValue = $old['amount'] ?? $payment['amount'];
$dateValue = $old['date'] ?? ($payment['created_at'] ? date('Y-m-d', strtotime($payment['created_at'])) : '');
$statutValue = $old['statut'] ?? $payment['status'];

$members = $pdo_connexion->query("SELECT member_id, full_name FROM member ORDER BY full_name ASC")->fetchAll();
$weeks = $pdo_connexion->query("SELECT week_id, week_number, year FROM week ORDER BY year DESC, week_number ASC")->fetchAll();
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
                <h2 class="text-2xl mb-6">Modifier le paiement</h2>

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

                <form action="../feats/admin/edit_payment.php" method="post">
                    <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($payment['payment_id']); ?>">

                    <div class="mb-4">
                        <div class="flex flex-col mb-4">
                            <label for="member_id" class="mb-1">Membres</label>

                            <select 
                                name="member_id" 
                                id="member_id" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="">Sélectionnez le membre</option>
                                <?php foreach ($members as $member): ?>
                                    <option 
                                        value="<?php echo $member['member_id']; ?>"
                                        <?php echo ($memberIdValue == $member['member_id']) ? 'selected' : ''; ?>
                                    >
                                        <?php echo htmlspecialchars($member['full_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['member_id'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['member_id']); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="week_id" class="mb-1">Semaines</label>

                            <select 
                                name="week_id" 
                                id="week_id" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="">Sélectionnez la semaine</option>
                                <?php foreach ($weeks as $week): ?>
                                    <option 
                                        value="<?php echo $week['week_id']; ?>"
                                        <?php echo ($weekIdValue == $week['week_id']) ? 'selected' : ''; ?>
                                    >
                                        Semaine <?php echo htmlspecialchars($week['week_number']); ?> (<?php echo htmlspecialchars($week['year']); ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['week_id'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['week_id']); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-6 flex flex-col">
                            <label for="amount" class="mb-1">Montant</label>
                            <input 
                                type="number" 
                                name="amount" 
                                id="amount"
                                value="<?php echo htmlspecialchars($amountValue); ?>"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                            <?php if (isset($errors['amount'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['amount']); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-6 flex flex-col">
                            <label for="date" class="mb-1">Date de paiement</label>
                            <input 
                                type="date" 
                                name="date" 
                                id="date"
                                value="<?php echo htmlspecialchars($dateValue); ?>"
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                            <?php if (isset($errors['date'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['date']); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="statut" class="mb-1">Statut</label>

                            <select 
                                name="statut" 
                                id="statut" 
                                class="border border-slate-600 px-3 py-2 rounded-md outline-purple-800 font-semibold"
                            >
                                <option value="">Sélectionnez le statut du paiement</option>
                                <option value="paid" <?php echo ($statutValue === 'paid') ? 'selected' : ''; ?>>Payé</option>
                                <option value="pending" <?php echo ($statutValue === 'pending') ? 'selected' : ''; ?>>En cours</option>
                                <option value="unpaid" <?php echo ($statutValue === 'unpaid') ? 'selected' : ''; ?>>Non payé</option>
                            </select>
                            <?php if (isset($errors['statut'])): ?>
                                <p class="text-red-600 text-sm mt-1"><?php echo htmlspecialchars($errors['statut']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="bg-purple-800 text-white font-semibold px-3 py-2 rounded-sm cursor-pointer">
                        Enregistrer les modifications
                    </button>
                    
                </form>
            </section>
        </div>
    </div>
   </main>

   <?php include_once('../includes/footer.php'); ?>
    
</body>
</html>