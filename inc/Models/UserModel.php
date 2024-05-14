<!-- UserModel.php -->
<?php

// Importing DatabaseModel for database operations
require_once __DIR__ . '/../Models/DatabaseModel.php';

// UserModel class extending DatabaseModel for user related operations
class UserModel extends DatabaseModel {

    // Constructor to initialize the UserModel
    public function __construct() {
        parent::__construct();
    }

    // Function to retrieve all users
    public function getAll() {
        // Prepare SQL query to select all users
        $stmt = $this->getDb()->query("SELECT * FROM users");
        // Fetch all the rows as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to retrieve user by username
    public function getUserByUsername($username) {
        // Prepare SQL query to select user by username
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE username = :username");
        // Execute the query with username as parameter
        $stmt->execute([':username' => $username]);
        // Fetch the user data as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to create a new user
    public function createUser($userData) {
        // Prepare SQL query to insert user data into users table
        $stmt = $this->getDb()->prepare("INSERT INTO users (first_name, last_name, email, password, telephone, username, address, village, ward, service_type, userrole, account_status) 
        VALUES (:first_name, :last_name, :email, :password, :telephone, :username, :address, :village, :ward, :service_type, :userrole, :account_status)");
        // Execute the query with user data as parameters
        $stmt->execute($userData);
    }

    // Function to retrieve service providers by service type
    public function getServiceProvidersByServiceType($serviceType) {
        // Prepare SQL query to select service providers by service type
        $stmt = $this->getDb()->prepare("SELECT first_name, last_name, telephone, village, ward FROM users WHERE userrole = 'service_provider' AND service_type = :service_type");
        // Bind the service type parameter
        $stmt->bindParam(':service_type', $serviceType);
        // Execute the query
        $stmt->execute();
        // Fetch all the rows as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to retrieve user profile by username
    public function getUserProfileByUsername($username) {
        // Prepare SQL query to select user profile by username
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE username = :username");
        // Execute the query with username as parameter
        $stmt->execute([':username' => $username]);
        // Fetch the user data as an associative array
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user is a service provider
        if ($userData['userrole'] === 'service_provider') {
            // If user is a service provider, fetch service type
            $stmt = $this->getDb()->prepare("SELECT service_type FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $serviceType = $stmt->fetch(PDO::FETCH_ASSOC);
            $userData['service_type'] = $serviceType['service_type'];
        }

        // Return the user data
        return $userData;
    }

    // Function to update account request
    public function updateAccountRequest($requesterUsername, $updateRequest) {
        // Prepare the SQL statement to insert account request
        $stmt = $this->getDb()->prepare("INSERT INTO accountrequests (requester_username, request_text) VALUES (:requester_username, :request_text)");
        // Bind the parameters
        $stmt->bindParam(':requester_username', $requesterUsername);
        $stmt->bindParam(':request_text', $updateRequest);

        // Execute the statement
        $stmt->execute();
    }
    
}

?>





