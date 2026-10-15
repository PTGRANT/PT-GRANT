<?php
// save.php
require_once 'config.php';
require_once 'init_db.php'; // Ensures tables exist before processing post request

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = getDBConnection();

        // Generate unique Ticket ID
        $ticket_id = 'PTG-' . rand(100000, 999999);

        // Sanitize and collect input data
        $assistance_type   = trim($_POST['assistance_type'] ?? '');
        $first_name        = trim($_POST['first_name'] ?? '');
        $last_name         = trim($_POST['last_name'] ?? '');
        $email             = trim($_POST['email'] ?? '');
        $phone             = trim($_POST['phone'] ?? '');
        $address1          = trim($_POST['address1'] ?? '');
        $address2          = trim($_POST['address2'] ?? '');
        $city              = trim($_POST['city'] ?? '');
        $state             = trim($_POST['state'] ?? '');
        $zip               = trim($_POST['zip'] ?? '');
        $employment_status = trim($_POST['employment_status'] ?? '');
        $pay_frequency     = trim($_POST['pay_frequency'] ?? '');
        $pay_amount        = floatval($_POST['pay_amount'] ?? 0);
        $credit_score      = trim($_POST['credit_score_range'] ?? '');
        $business_name     = !empty($_POST['business_name']) ? trim($_POST['business_name']) : null;
        $business_ein      = !empty($_POST['business_ein']) ? trim($_POST['business_ein']) : null;
        $business_revenue  = !empty($_POST['business_revenue']) ? trim($_POST['business_revenue']) : null;

        // Insert applicant record
        $stmt = $pdo->prepare("INSERT INTO applications 
            (ticket_id, assistance_type, first_name, last_name, email, phone, address1, address2, city, state, zip, employment_status, pay_frequency, pay_amount, credit_score_range, business_name, business_ein, business_revenue)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $ticket_id, $assistance_type, $first_name, $last_name, $email, $phone,
            $address1, $address2, $city, $state, $zip, $employment_status,
            $pay_frequency, $pay_amount, $credit_score, $business_name, $business_ein, $business_revenue
        ]);

        echo json_encode([
            'success' => true,
            'ticket_id' => $ticket_id,
            'message' => "Application Submitted! Please write down your Ticket ID: {$ticket_id}. Use it with your last name to check application status."
        ]);

    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => 'Error saving application: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request method.'
    ]);
}
?>
