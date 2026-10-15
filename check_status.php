<?php
// check_status.php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = getDBConnection();
    $ticket_id = trim($_POST['ticket_id'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');

    $stmt = $pdo->prepare("SELECT * FROM applications WHERE ticket_id = ? AND LOWER(last_name) = LOWER(?)");
    $stmt->execute([$ticket_id, $last_name]);
    $app = $stmt->fetch();

    if ($app) {
        // Fetch Messages
        $msgStmt = $pdo->prepare("SELECT * FROM messages WHERE ticket_id = ? ORDER BY created_at ASC");
        $msgStmt->execute([$ticket_id]);
        $messages = $msgStmt->fetchAll();

        // Fetch Uploads
        $upStmt = $pdo->prepare("SELECT * FROM uploads WHERE ticket_id = ?");
        $upStmt->execute([$ticket_id]);
        $uploads = $upStmt->fetchAll();

        echo json_encode([
            'success' => true,
            'application' => $app,
            'messages' => $messages,
            'uploads' => $uploads
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid Ticket ID or Last Name combination.']);
    }
}
?>
