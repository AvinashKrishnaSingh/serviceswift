<!-- AdminController.php -->

<?php

// Include necessary models
require_once __DIR__ . '/../Models/AdminModel.php';
require_once __DIR__ . '/../Models/CustomerModel.php';
require_once __DIR__ . '/../Models/ServiceProviderModel.php';
require_once __DIR__ . '/../Models/UserModel.php';

class AdminController {

    // Initialize models
    public function __construct() {
        $this->adminModel = new AdminModel();
        $this->customerModel = new CustomerModel();
        $this->serviceProviderModel = new ServiceProviderModel();
        $this->userModel = new UserModel(); // Changed UserModel to userModel for consistency
    }

    // Display admin dashboard
    public function AdminDashboard() {
        // Fetch list of customers and service providers
        $customers = $this->adminModel->getCustomers();
        $serviceProviders = $this->adminModel->getServiceProviders();
        require_once __DIR__ . '/../Views/AdminViews/AdminDashboard.php';
    }

    // Update user details
    public function updateUser() {
        $user = []; // Initialize $user array
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form submission

            // Check if all required fields are set
            if (!isset($_POST['old_username']) || !isset($_POST['username']) || !isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['telephone']) || !isset($_POST['address'])) {
                // Redirect or display an error message
            }

            // Get the form data and store it in the $user array
            $user = [
                'old_username' => $_POST['old_username'],
                'username' => $_POST['username'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'telephone' => $_POST['telephone'],
                'address' => $_POST['address']
            ];

            // Check if the service type is set
            if (isset($_POST['service_type'])) {
                // If service_type is set, it's a service provider
                $serviceType = $_POST['service_type'];
                $success = $this->adminModel->updateUser($user['old_username'], $user['username'], $user['first_name'], $user['last_name'], $user['telephone'], $serviceType, $user['address']);
            } else {
                // If service_type is not set, it's a customer
                $success = $this->adminModel->updateUser($user['old_username'], $user['username'], $user['first_name'], $user['last_name'], $user['telephone'], null, $user['address']);
            }

            if ($success) {
                // Redirect to AdminDashboard after updating user
                header("Location: " . URLROOT . "/AdminDashboard");
                exit();
            } 
        } else {
            // Fetch the user data if available
            if (isset($_GET['username'])) {
                $username = $_GET['username'];
                $user = $this->adminModel->getUserByUsername($username);
            }
        }

        // Pass $user to the view
        require_once __DIR__ . '/../Views/AdminViews/EditAdminView.php';
    }

    // Function to delete a user
    public function deleteUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if the username is provided
            if (!isset($_POST['username'])) {
                // Handle the error (redirect or display an error message)
            }

            // Get the username from the request
            $username = $_POST['username'];

            // Call the deleteUser method of the AdminModel
            $success = $this->adminModel->deleteUser($username);

            if ($success) {
                header("Location: " . URLROOT . "/AdminDashboard");
            }
        }
    }

    // Show user activity
    public function showActivity() {
        // Check if a user's username is provided
        if (isset($_GET['username'])) {
            $username = $_GET['username'];

            // Check if the user is a customer or a service provider
            $user = $this->userModel->getUserByUsername($username);

            if ($user) {
                // Fetch requests based on the user type
                if ($user['userrole'] === 'customer') {
                    $requests = $this->customerModel->getRequestsByCustomer($username);
                } elseif ($user['userrole'] === 'service_provider') {
                    $requests = $this->serviceProviderModel->getRequestsByServiceProvider($username);
                }
                require_once __DIR__ . '/../Views/AdminViews/ActivityAdminView.php';
            }
        }
    }

    // Show all requests
    public function showRequests() {
        // Fetch all requests
        $requests = $this->adminModel->getAllRequests();

        // Load the UserRequests view and pass the requests data
        require_once __DIR__ . '/../Views/AdminViews/UserRequests.php';
    }

    // Toggle service provider status
    public function toggleServiceProviderStatus() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['account_status'])) {
            $username = $_POST['username'];
            $account_status = $_POST['account_status'] === 'Active' ? 'Inactive' : 'Active';

            // Toggle service provider status
            $success = $this->adminModel->toggleServiceProviderStatus($username, $account_status);

            if ($success) {
                // Redirect back to the admin dashboard
                header("Location: " . URLROOT . "/AdminDashboard");
                exit;
            }
        }
    }
}

?>
