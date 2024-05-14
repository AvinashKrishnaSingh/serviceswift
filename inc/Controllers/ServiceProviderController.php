<!-- ServiceProviderController.php -->
<?php

// Import required models
require_once __DIR__ . '/../Models/ServiceProviderModel.php';
require_once __DIR__ . '/../Models/UserModel.php';

class ServiceProviderController {

    // ServiceProviderModel instance
    private $serviceProviderModel;

    // Constructor to initialize the ServiceProviderModel
    public function __construct() {
        $this->serviceProviderModel = new ServiceProviderModel();
    }

    // Render Service Provider Dashboard
    public function ServiceProviderDashboard() {
        // Fetch requests for the service provider
        $requests = $this->serviceProviderModel->getRequestsByServiceProvider($_SESSION['username']);
        // Load ServiceProviderDashboard view
        require_once __DIR__ . '/../Views/ServiceProviderViews/ServiceProviderDashboard.php';
    }

    // Cancel a request
    public function cancelRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requestId = $_POST['request_id'];
            $success = $this->serviceProviderModel->updateRequestStatus($requestId, 'Cancelled by Service Provider');
            if ($success) {
                // Redirect to the ServiceProviderDashboard after successful cancellation
                header('Location: ' . URLROOT . '/ServiceProviderDashboard');
                exit();
            } else {
                // Redirect or display an error message
            }
        }
    }

    // Accept a request
    public function acceptRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requestId = $_POST['request_id'];
            $success = $this->serviceProviderModel->updateRequestStatus($requestId, 'Accepted');
            if ($success) {
                // Redirect to the ServiceProviderDashboard after successful acceptance
                header('Location: ' . URLROOT . '/ServiceProviderDashboard');
                exit();
            } else {
                // Redirect or display an error message
            }
        }
    }

    // Complete a request
    public function completeRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $requestId = $_POST['request_id'];
            $success = $this->serviceProviderModel->updateRequestStatus($requestId, 'Completed');
            if ($success) {
                // Redirect to the ServiceProviderDashboard after successful completion
                header('Location: ' . URLROOT . '/ServiceProviderDashboard');
                exit();
            } else {
                // Redirect or display an error message
            }
        }
    }

    // Render user account page
    public function myAccount() {
        // Fetch the username of the logged-in user from the session
        $username = $_SESSION['username'];
        
        // Instantiate the UserModel
        $userModel = new UserModel();
        
        // Fetch user profile data based on the username
        $userData = $userModel->getUserProfileByUsername($username);
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the update request from the form
            $updateRequest = $_POST['update_request'];
            
            // Store the account update request in the database
            $userModel->updateAccountRequest($username, $updateRequest);
            
            // Redirect back to the profile page or perform any other action as needed
            header('Location: ' . URLROOT . '/myAccount');
            exit();
        }
        
        // Require the profile view and pass the user data to it
        require_once __DIR__ . '/../Views/Profile/myprofile.php';
    }
}

?>



