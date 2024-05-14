<!-- IndexControllerphp-->
<?php
class IndexController {
  
  public function initializedbview() {
    require_once __DIR__ . '/../Views/Databasesetup/intilizedatabaseformview.php';
  }

  public function HomePage() {
    require_once __DIR__ . '/../Views/HomePage/homepageusersview.php';
  }

  public function Login() {
    require_once __DIR__ . '/../Views/Authentication/Login.php';
  }

  public function Register() {
    require_once __DIR__ . '/../Views/Authentication/registerview.php';
  }

  public function Logout() {
    require_once __DIR__ . '/../Views/signOutForm/signoutform.php'; 
    session_unset();
    session_destroy();
  }
}
?>
