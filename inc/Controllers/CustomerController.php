<!-- CustomerController.php -->
<?php

// Import required models
require_once __DIR__ . '/../Models/CustomerModel.php';
require_once __DIR__ . '/../Models/UserModel.php';

class CustomerController {

    // Render Customer Dashboard
    public function CustomerDashboard() {
        $customerModel = new CustomerModel();
        // Fetch requests made by the customer
        $customerUsername = $_SESSION['username']; // Assuming $_SESSION['username'] contains the username of the logged-in customer
        $requests = $customerModel->getRequestsByCustomer($customerUsername);
        // Load the CustomerDashboard view and pass the requests data
        require_once __DIR__ . '/../Views/CustomerViews/CustomerDashboard.php';
    }

    // Render View Services
    public function ViewServices() {
        require_once __DIR__ . '/../Views/CustomerViews/ViewServices.php';
    }

    // Render Service Providers based on service type
    public function ServiceProviders() {
        if (isset($_GET['service_type'])) {
            // If service_type parameter exists in the URL, show providers for that type
            $this->showServiceProviders($_GET['service_type']);
        } else {
            // Otherwise, load the ServiceProviders view without any specific service type
            require_once __DIR__ . '/../Views/CustomerViews/ServiceProviders.php';
        }
    }

    // Show Service Providers for a specific service type
    public function showServiceProviders($service_type) {
        $customerModel = new CustomerModel();
        $serviceProviders = $customerModel->getServiceProvidersByServiceType($service_type);
        // Pass the serviceProviders variable to the view
        require_once __DIR__ . '/../Views/CustomerViews/ServiceProviders.php';
    }

    // Render Request Services form
    public function RequestServices() {
        require_once __DIR__ . '/../Views/CustomerViews/RequestServices.php';
    }

    // Store submitted requests
    public function storeRequests() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $requestData = [
                'date_scheduled' => $_POST['date_scheduled'],
                'service_location' => $_POST['service_location'],
                'client_name' => $_POST['client_name'],
                'comments' => $_POST['comments'],
                'requester_username' => $_SESSION['username'], // Assuming the requester username is stored in session
                'service_provider_username' => $_POST['service_provider_username'] // Assuming you have this value from the form
            ];
    
            // Debugging: Output the array for checking
            print_r($requestData);
    
            // Create a new instance of CustomerModel
            $customerModel = new CustomerModel();
    
            // Call the createRequest function to store the request data
            $success = $customerModel->createRequest($requestData);
    
            // Check if request creation was successful
            if ($success) {
                header('Location: ' . URLROOT . '/CustomerDashboard');
                exit();
            }
        } 
    }

    // Cancel a request
    public function cancelRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the request ID from the form
            $requestId = $_POST['request_id'];
    
            // Update the status of the request to 'Cancelled' in the database
            $customerModel = new CustomerModel();
            $success = $customerModel->cancelRequestById($requestId);
    
            // Redirect back to the customer dashboard
            if ($success) {
                header('Location: ' . URLROOT . '/CustomerDashboard');
                exit();
            } else {
                // Handle error
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