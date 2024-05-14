<!-- DatabaseController.php -->
<?php

// Import the DatabaseModel
require_once __DIR__ . '/../Models/DatabaseModel.php';

class DatabaseController {
    // Database model instance
    private $dbModel;

    // Constructor to initialize the database model
    public function __construct() {
        $this->dbModel = new DatabaseModel();
    }

    // Setup database with initial values and tables
    public function setupDatabase() {
        // Check if 'admin' user already exists before inserting
        $stmt = $this->dbModel->getDb()->prepare("SELECT COUNT(*) FROM `admin` WHERE `username` = 'admin'");
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // If 'admin' user doesn't exist, insert default admin values
        if ($count == 0) {
            // Hash the admin password before inserting
            $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
            // Insert hard-coded admin values only if 'admin' doesn't exist
            $stmt = $this->dbModel->getDb()->prepare("
                INSERT INTO `admin` (`first_name`, `last_name`, `username`, `email`, `password`, `address`, `contact`, `created_at`, `updated_at`, `userrole`, `designation`)
                VALUES ('Admin', 'User', 'admin', '', ?, 'Admin', '0000000', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'admin', NULL)
            ");
            $stmt->execute([$hashedPassword]);
        }

        // Create the serviceswift database if it does not exist
        $this->dbModel->createDatabase();

        // Select the serviceswift database
        $this->dbModel->selectDatabase();

        // Create the required tables if they do not exist
        $this->dbModel->createTables();

        // Redirect to the homepage after setup
        header('Location: ' . URLROOT . '/Home');
        exit;
    }
}

?>










