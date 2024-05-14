<!-- ServiceProviderModel.php -->
<?php

// Importing DatabaseModel for database operations
require_once __DIR__ . '/../Models/DatabaseModel.php';

// ServiceProviderModel class extending DatabaseModel for service provider related operations
class ServiceProviderModel extends DatabaseModel {

    // Constructor to initialize the ServiceProviderModel
    public function __construct() {
        parent::__construct();
    }

    // Function to retrieve requests by service provider
    public function getRequestsByServiceProvider($serviceProviderUsername) {
        try {
            // Prepare SQL query to fetch requests
            $stmt = $this->getDb()->prepare("
                SELECT makerequests.*, users.telephone AS contact
                FROM makerequests
                JOIN users ON makerequests.requester_username = users.username
                WHERE service_provider_username = ?
            ");
            // Execute the query with service provider username as parameter
            $stmt->execute([$serviceProviderUsername]);
            // Fetch all the rows as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    // Function to update request status
    public function updateRequestStatus($requestId, $status) {
        try {
            // Prepare SQL query to update request status
            $stmt = $this->getDb()->prepare("UPDATE makerequests SET status = ? WHERE id = ?");
            // Execute the query with request ID and status as parameters
            $stmt->execute([$status, $requestId]);
            return true; // Return true if update is successful
        } catch (PDOException $e) {
            // Log or display the error message
            echo "Error: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }
}

?>
