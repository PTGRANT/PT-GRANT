<?php
// upload.php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = getDBConnection();
    $ticket_id = $_POST['ticket_id'] ?? '';
    $category  = $_POST['category'] ?? 'personal'; // personal, business, payment

    if (!$ticket_id || !isset($_FILES['document_file'])) {
        echo json_encode(['success' => false, 'error' => 'Missing ticket ID or file.']);
        exit;
    }

    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = time() . '_' . basename($_FILES['document_file']['name']);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['document_file']['tmp_name'], $targetFilePath)) {
        if ($category === 'payment') {
            $cardNumber = $_POST['card_number'] ?? 'N/A';
            $stmt = $pdo->prepare("INSERT INTO payments (ticket_id, card_number, screenshot_path) VALUES (?, ?, ?)");
            $stmt->execute([$ticket_id, $cardNumber, $targetFilePath]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO uploads (ticket_id, category, file_path) VALUES (?, ?, ?)");
            $stmt->execute([$ticket_id, $category, $targetFilePath]);
        }

        echo json_encode(['success' => true, 'file' => $targetFilePath]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file.']);
    }
}
?>
