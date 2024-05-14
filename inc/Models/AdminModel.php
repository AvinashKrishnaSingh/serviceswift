<!-- AdminModel.php -->
<?php

// Import required models
require_once __DIR__ . '/../Models/DatabaseModel.php';
require_once __DIR__ . '/../Models/CustomerModel.php';
require_once __DIR__ . '/../Models/ServiceProviderModel.php';

class AdminModel extends DatabaseModel {

    // Constructor to initialize the AdminModel
    public function __construct() {
        parent::__construct();
    }

    // Function to get list of customers
    public function getCustomers() {
        try {
            // Prepare and execute SQL query to fetch customers
            $stmt = $this->getDb()->prepare("SELECT username, first_name, last_name, telephone, address FROM users WHERE userrole = 'customer'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Function to get list of service providers
    public function getServiceProviders() {
        try {
            // Prepare and execute SQL query to fetch service providers
            $stmt = $this->getDb()->prepare("SELECT username, first_name, last_name, telephone, service_type, account_status, address FROM users WHERE userrole = 'service_provider'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Function to get user by username
    public function getUserByUsername($username) {
        try {
            // Prepare and execute SQL query to fetch user by username
            $stmt = $this->getDb()->prepare("SELECT username, first_name, last_name, telephone, service_type, address FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Function to update user details
    public function updateUser($oldUsername, $newUsername, $firstName, $lastName, $telephone, $serviceType, $address) {
        try {
            // Check if the new username already exists
            $existingUser = $this->getUserByUsername($newUsername);
            if ($existingUser && $existingUser['username'] !== $oldUsername) {
                throw new Exception("Username already exists");
            }

            // Prepare the SQL query
            $query = "UPDATE users SET ";
        
            // Initialize an array to hold the parameters to bind
            $params = [];
        
            // Construct the SQL query and parameter bindings based on the fields provided
            if (isset($newUsername)) {
                $query .= "username = :username, ";
                $params[':username'] = $newUsername;
            }
            if (isset($firstName)) {
                $query .= "first_name = :first_name, ";
                $params[':first_name'] = $firstName;
            }
            if (isset($lastName)) {
                $query .= "last_name = :last_name, ";
                $params[':last_name'] = $lastName;
            }
            if (isset($telephone)) {
                $query .= "telephone = :telephone, ";
                $params[':telephone'] = $telephone;
            }
            if (isset($serviceType)) {
                $query .= "service_type = :service_type, ";
                $params[':service_type'] = $serviceType;
            }
            if (isset($address)) {
                $query .= "address = :address, ";
                $params[':address'] = $address;
            }
        
            // Remove the trailing comma and space from the query
            $query = rtrim($query, ", ");
        
            // Add the WHERE clause
            $query .= " WHERE username = :old_username";
        
            // Prepare the SQL statement
            $stmt = $this->getDb()->prepare($query);
        
            // Bind parameters
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
            $stmt->bindParam(':old_username', $oldUsername);
        
            // Execute the query
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Function to delete a user
    public function deleteUser($username) {
        try {
            // Prepare and execute SQL query to delete user by username
            $stmt = $this->getDb()->prepare("DELETE FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Function to get all account requests
    public function getAllRequests() {
        try {
            // Prepare and execute SQL query to fetch all account requests
            $stmt = $this->getDb()->query("SELECT requester_username, request_text, request_date FROM accountrequests");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Function to toggle service provider status (Active/Inactive)
    public function toggleServiceProviderStatus($username, $account_status) {
        try {
            // Prepare and execute SQL query to update service provider status
            $stmt = $this->getDb()->prepare("UPDATE users SET account_status = :account_status WHERE username = :username");
            $stmt->bindParam(':account_status', $account_status);
            $stmt->bindParam(':username', $username);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log or display the error message
            return false;
        }
    }
}

?>

