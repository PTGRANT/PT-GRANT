<?php
// admin.php
require_once 'config.php';
$pdo = getDBConnection();

// Handle Status/Amount Updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_app') {
    $ticket_id = $_POST['ticket_id'];
    $status    = $_POST['status'];
    $approved  = floatval($_POST['approved_amount']);
    $pending   = floatval($_POST['pending_amount']);

    $stmt = $pdo->prepare("UPDATE applications SET status = ?, approved_amount = ?, pending_amount = ? WHERE ticket_id = ?");
    $stmt->execute([$status, $approved, $pending, $ticket_id]);
    header("Location: admin.php?updated=" . $ticket_id);
    exit;
}

// Handle Admin Messaging
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'send_message') {
    $ticket_id = $_POST['ticket_id'];
    $msg       = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO messages (ticket_id, sender, message) VALUES (?, 'admin', ?)");
    $stmt->execute([$ticket_id, $msg]);
    header("Location: admin.php?msg_sent=" . $ticket_id);
    exit;
}

// Fetch all applications
$applications = $pdo->query("SELECT * FROM applications ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PT GRANT - Admin Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-indigo-900">PT GRANT Administrative Management Portal</h1>
        
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">All Applications</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">Ticket ID</th>
                            <th class="p-3">Applicant Name</th>
                            <th class="p-3">Assistance</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Approved Grant</th>
                            <th class="p-3">Pending Grant</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($applications as $app): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-bold"><?= htmlspecialchars($app['ticket_id']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($app['first_name'] . ' ' . $app['last_name']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($app['assistance_type']) ?></td>
                            <td class="p-3"><span class="px-2 py-1 bg-blue-100 text-blue-800 rounded font-semibold"><?= htmlspecialchars($app['status']) ?></span></td>
                            <td class="p-3 text-green-600 font-bold">$<?= number_format($app['approved_amount'], 2) ?></td>
                            <td class="p-3 text-amber-600 font-bold">$<?= number_format($app['pending_amount'], 2) ?></td>
                            <td class="p-3">
                                <form method="POST" class="inline-block flex gap-2">
                                    <input type="hidden" name="action" value="update_app">
                                    <input type="hidden" name="ticket_id" value="<?= $app['ticket_id'] ?>">
                                    <select name="status" class="border rounded p-1 text-sm">
                                        <option value="Under Review" <?= $app['status'] == 'Under Review' ? 'selected':'' ?>>Under Review</option>
                                        <option value="Approved" <?= $app['status'] == 'Approved' ? 'selected':'' ?>>Approved</option>
                                        <option value="Payment Verification" <?= $app['status'] == 'Payment Verification' ? 'selected':'' ?>>Payment Verification</option>
                                        <option value="Disbursed" <?= $app['status'] == 'Disbursed' ? 'selected':'' ?>>Disbursed</option>
                                    </select>
                                    <input type="number" name="approved_amount" value="<?= $app['approved_amount'] ?>" class="w-24 border rounded p-1 text-sm" placeholder="Approved">
                                    <input type="number" name="pending_amount" value="<?= $app['pending_amount'] ?>" class="w-24 border rounded p-1 text-sm" placeholder="Pending">
                                    <button class="bg-indigo-600 text-white px-3 py-1 rounded text-sm hover:bg-indigo-700">Save</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
