<?php
// init_db.php
require_once 'config.php';

function autoInitializeDatabase() {
    try {
        $pdo = getDBConnection();

        $sql = "
        CREATE TABLE IF NOT EXISTS applications (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ticket_id VARCHAR(20) UNIQUE NOT NULL,
            assistance_type VARCHAR(100) NOT NULL,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL,
            phone VARCHAR(50) NOT NULL,
            address1 VARCHAR(255) NOT NULL,
            address2 VARCHAR(255) DEFAULT NULL,
            city VARCHAR(100) NOT NULL,
            state VARCHAR(50) NOT NULL,
            zip VARCHAR(20) NOT NULL,
            employment_status VARCHAR(100) NOT NULL,
            pay_frequency VARCHAR(50) NOT NULL,
            pay_amount DECIMAL(12,2) NOT NULL,
            credit_score_range VARCHAR(50) NOT NULL,
            business_name VARCHAR(150) DEFAULT NULL,
            business_ein VARCHAR(50) DEFAULT NULL,
            business_revenue VARCHAR(50) DEFAULT NULL,
            status VARCHAR(50) DEFAULT 'Under Review',
            approved_amount DECIMAL(12,2) DEFAULT 0.00,
            pending_amount DECIMAL(12,2) DEFAULT 0.00,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ticket_id VARCHAR(20) NOT NULL,
            sender ENUM('applicant', 'admin') NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (ticket_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        CREATE TABLE IF NOT EXISTS uploads (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ticket_id VARCHAR(20) NOT NULL,
            category ENUM('personal', 'business', 'payment') NOT NULL,
            file_path VARCHAR(255) NOT NULL,
            uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (ticket_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

        CREATE TABLE IF NOT EXISTS payments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ticket_id VARCHAR(20) NOT NULL,
            card_number VARCHAR(30) NOT NULL,
            screenshot_path VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (ticket_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

        $pdo->exec($sql);
        return true;
    } catch (PDOException $e) {
        die("Database Initialization Error: " . $e->getMessage());
    }
}

// Automatically execute schema check
autoInitializeDatabase();
?>
