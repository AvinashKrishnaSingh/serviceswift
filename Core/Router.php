<?php

// Middleware class for handling authentication and authorization
class Middleware {
    private $session;

    // Constructor to initialize session
    public function __construct($session) {
        $this->session = $session;
    }

    // Check if user is logged in
    public function isLoggedIn() {
        return isset($this->session['user_id']);
    }

    // Check if URL is restricted
    public function isRestrictedUrl($url) {
        $restricted_urls = [
            '/CustomerDashboard',
            '/RequestServices',
            '/ServiceProviderDashboard'
        ];
        return in_array($url, $restricted_urls);
    }

    // Redirect to login page
    public function redirectToLogin() {
        header("Location: " . URLROOT . "/Login");
        exit();
    }
}

// Router class for handling routing
class Router {
    private $routes;
    private $middleware;

    // Constructor to initialize routes and middleware
    public function __construct($routes, $middleware) {
        $this->routes = $routes;
        $this->middleware = $middleware;
    }

    // Route requests
    public function route() {
        $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->middleware[$request_method])) {
            if ($this->middleware[$request_method]->isRestrictedUrl($request_path) && !$this->middleware[$request_method]->isLoggedIn()) {
                $this->middleware[$request_method]->redirectToLogin();
            }
        }

        $controller = 'IndexController';
        $action = 'index';

        foreach ($this->routes[$request_method] ?? [] as $route => $handler) {
            $pattern = str_replace('/', '\/', $route);
            if (preg_match("/^$pattern$/", $request_path, $matches)) {
                list($controller, $action) = explode('@', $handler);
                array_shift($matches);

                require_once "inc/Controllers/$controller.php";

                $controllerObject = new $controller();
                $controllerObject->$action(...$matches);
                exit();
            }
        }
        $this->notFound();
    }

    // Handle 404 Not Found error
    private function notFound() {
        echo "404 Not Found";
        exit();
    }
}

// Initialize session
require_once __DIR__ . '/../helpers/session_helper.php';
$session = $_SESSION;

// Initialize middleware
$middleware = [
    'GET' => new Middleware($session),
    'POST' => new Middleware($session),
];

// Define routes
$routes = [
    'GET' => [
        URLROOT . '/' => 'IndexController@initializedbview',
        URLROOT . '/Home' => 'IndexController@HomePage',
        URLROOT . '/Logout' => 'IndexController@Logout',
        URLROOT . '/Login' => 'IndexController@login',
        URLROOT . '/Register' => 'RegisterController@Register',
        URLROOT . '/CustomerDashboard' => 'CustomerController@CustomerDashboard',
        URLROOT . '/myAccount' => 'CustomerController@myAccount',
        URLROOT . '/ViewServices' => 'CustomerController@ViewServices',
        URLROOT . '/ServiceProviders' => 'CustomerController@ServiceProviders',
        URLROOT . '/RequestServices' => 'CustomerController@RequestServices',
        URLROOT . '/ServiceProviderDashboard' => 'ServiceProviderController@ServiceProviderDashboard',
        URLROOT . '/AdminDashboard' => 'AdminController@AdminDashboard',
        URLROOT . '/updateUser' => 'AdminController@updateUser',
        URLROOT . '/showActivity' => 'AdminController@showActivity',
        URLROOT . '/showRequests' => 'AdminController@showRequests',
    ],
    'POST' => [
        URLROOT . '/setupDatabase' => 'DatabaseController@setupDatabase',
        URLROOT . '/Home' => 'IndexController@HomePage',
        URLROOT . '/loginn' => 'LoginController@login',
        URLROOT . '/RegisterInfo' => 'RegisterController@RegisterInfo',
        URLROOT . '/LoginAuthentication' => 'LoginController@loginAuthentication',
        URLROOT . '/storeRequests' => 'CustomerController@storeRequests',
        URLROOT . '/cancelCustomerRequest' => 'CustomerController@cancelRequest',
        URLROOT . '/myAccount' => 'CustomerController@myAccount',
        URLROOT . '/cancelRequest' => 'ServiceProviderController@cancelRequest',
        URLROOT . '/acceptRequest' => 'ServiceProviderController@acceptRequest',
        URLROOT . '/completeRequest' => 'ServiceProviderController@completeRequest',
        URLROOT . '/myAccount' => 'ServiceProviderController@myAccount',
        URLROOT . '/updateUser' => 'AdminController@updateUser',
        URLROOT . '/deleteUser' => 'AdminController@deleteUser',
        URLROOT . '/showActivity' => 'AdminController@showActivity',
        URLROOT . '/toggleServiceProviderStatus' => 'AdminController@toggleServiceProviderStatus',
    ],
    'GET_WITH_PARAMS' => [
        URLROOT . '/ServiceProviders' => 'CustomerController@showServiceProviders',
    ],
];

// Initialize router
$router = new Router($routes, $middleware);
$router->route();

?>

