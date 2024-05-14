<!-- RegisterController.php -->
<?php

// Import required models
require_once __DIR__ . '/../Models/DatabaseModel.php';
require_once __DIR__ . '/../Models/UserModel.php';

class RegisterController {
    // Database model and user model instances
    private $databaseModel;
    private $userModel;

    // Render registration form
    public function Register() {
        // Load registration view
        require_once __DIR__ . '/../Views/Authentication/registerview.php';
    }

    // Insert user information into the database
    public function RegisterInfo() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Hash the password
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
            // Prepare user data for insertion
            $userData = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'username' => $_POST['username'],
                'password' => $hashedPassword, // Hashed password
                'address' => $_POST['address'],
                'village' => $_POST['village'],
                'ward' => $_POST['ward'],
                'userrole' => $_POST['userrole'],
                'account_status' => $_POST['account_status']
            ];
    
            // Check if 'service_type' key exists in $_POST array
            if (isset($_POST['service_type'])) {
                // If it exists, add it to $userData
                $userData['service_type'] = $_POST['service_type'];
            } else {
                // If it doesn't exist, set it to NULL or handle it accordingly based on your requirement
                $userData['service_type'] = null;
            }
    
            // Instantiate the userModel class
            $this->userModel = new UserModel();
    
            // Call the create method to insert data into the database
            $this->userModel->createUser($userData);
    
            // Redirect to the login page after successful insertion
            header('Location: ' . URLROOT . '/Login');
            exit;
        }
    }    
}

?>

