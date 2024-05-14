<!-- LoginModel.php -->
<?php

// Importing DatabaseModel for database operations
require_once __DIR__ . '/../models/DatabaseModel.php';

// LoginModel class for user authentication
class LoginModel {
    private $db;

    // Constructor to initialize DatabaseModel instance
    public function __construct() {
        $this->db = new DatabaseModel();
    }

    // Function for user authentication
    public function loginAuthentication($username, $password) {
        // Query to retrieve user from 'users' table
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->getDb()->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If user exists in 'users' table
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                return ['username' => $user['username'], 'userrole' => $user['userrole']];
            }
        } else {
            // If user not found in 'users' table, check 'admin' table
            $query = "SELECT * FROM admin WHERE username = :username";
            $stmt = $this->db->getDb()->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // If user exists in 'admin' table
            if ($admin) {
                // Verify the password
                if (password_verify($password, $admin['password'])) {
                    return ['username' => $admin['username'], 'userrole' => $admin['userrole']];
                }
            }
        }
        
        // If username or password is incorrect
        return false;
    }
}

?>


