<!-- LoginController.php -->
<?php

// Import LoginModel
require_once __DIR__ . '/../Models/LoginModel.php';

class LoginController {
    // Method to authenticate user login
    public function loginAuthentication() {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("HTTP/1.0 405 Method Not Allowed");
            exit();
        }

        // Check if username and password are provided
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            // Redirect to login page with error message if credentials are missing
            header("Location: " . URLROOT . "/Login?error=missing_credentials");
            exit();
        }

        // Retrieve username and password from the POST data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Instantiate LoginModel
        $loginModel = new LoginModel();

        // Attempt to authenticate user
        $userInfo = $loginModel->loginAuthentication($username, $password);
        
        // If authentication successful, set session variables and redirect
        if ($userInfo) {
            session_start();
            $_SESSION['username'] = $userInfo['username'];
            $_SESSION['userrole'] = $userInfo['userrole'];
            $redirectUrl = '';

            // Check user role and set redirect URL accordingly
            switch ($userInfo['userrole']) {
                case 'customer':
                    $redirectUrl = URLROOT . '/CustomerDashboard';
                    break;
                case 'service_provider':
                    $redirectUrl = URLROOT . '/ServiceProviderDashboard';
                    break;
                case 'admin':
                    $redirectUrl = URLROOT . '/AdminDashboard';
                    break;
                default:
                    break;
            }

            // Redirect user to appropriate dashboard
            header('Location: ' . $redirectUrl);
            exit();
        } else {
            // Redirect to login page with error message if authentication fails
            header("Location: " . URLROOT . "/Login?error=invalid_credentials");
            exit();
        }
    }
}

?>
