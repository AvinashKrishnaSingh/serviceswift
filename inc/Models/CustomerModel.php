<!-- CustomerModel.php -->
<?php

// Import required models
require_once __DIR__ . '/../Models/DatabaseModel.php';

class CustomerModel extends DatabaseModel {

    // Constructor to initialize the CustomerModel
    public function __construct() {
        parent::__construct();
    }

    // Function to retrieve service providers by service type
    public function getServiceProvidersByServiceType($service_type) {
        try {
            // Ensure $service_type is not empty and is a valid string
            if (!empty($service_type) && is_string($service_type)) {
                // Prepare and execute SQL query to fetch service providers
                $stmt = $this->getDb()->prepare("SELECT username, first_name, last_name, telephone, village, ward, account_status FROM users WHERE userrole = 'service_provider' AND service_type = :service_type AND account_status = 'Active'");
                $stmt->execute(array(':service_type' => $service_type));
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // If $service_type is invalid or empty, return an empty array
                return [];
            }
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }
    
    // Function to create a request
    public function createRequest($requestData) {
        try {
            // Get user_id and service_provider_id from usernames
            $stmt_user = $this->getDb()->prepare("SELECT username FROM users WHERE username = ?");
            $stmt_user->execute([$requestData['requester_username']]);
            $requester_id = $stmt_user->fetchColumn();
            $stmt_provider = $this->getDb()->prepare("SELECT username FROM users WHERE username = ?");
            $stmt_provider->execute([$requestData['service_provider_username']]);
            $provider_id = $stmt_provider->fetchColumn();
    
            // Insert into makerequests table with status as 'Pending'
            $stmt = $this->getDb()->prepare("INSERT INTO makerequests (date_scheduled, service_location, client_name, comments, requester_username, service_provider_username, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$requestData['date_scheduled'], $requestData['service_location'], $requestData['client_name'], $requestData['comments'], $requestData['requester_username'], $requestData['service_provider_username'], 'Pending']);
            return true; // Return true if the request is successfully created
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }

    // Function to fetch requests made by a customer
    public function getRequestsByCustomer($customerUsername) {
        try {
            // Prepare and execute SQL query to fetch requests made by the customer
            $stmt = $this->getDb()->prepare("SELECT makerequests.*, users.telephone AS provider_telephone
                                            FROM makerequests
                                            INNER JOIN users ON makerequests.service_provider_username = users.username
                                            WHERE makerequests.requester_username = ?");
            // Execute the query with the customer's username as the parameter
            $stmt->execute([$customerUsername]);
            // Fetch all the rows as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    // Function to cancel a request by its ID
    public function cancelRequestById($requestId) {
        try {
            // Update the status of the request to 'Cancelled'
            $stmt = $this->getDb()->prepare("UPDATE makerequests SET status = 'Cancelled by Customer' WHERE id = ?");
            $stmt->execute([$requestId]);
            return true;
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>
