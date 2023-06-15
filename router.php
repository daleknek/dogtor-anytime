<?php

class Router {

    protected $routes = [

        'home' => [
            'controller' => 'HomeController',
            'action' => 'index'
        ],
        'login' => [
            'controller' => 'LoginController',
            'action' => 'index'
        ],
        'signup' => [
            'controller' => 'SignUpController',
            'action' => 'index'
        ],
        'profile' => [
            'controller' => 'ProfileController',
            'action' => 'index'
        ],
        'appointments' => [
            'controller' => 'AppointmentsController',
            'action' => 'index'
        ],
        'appointments' => [
            'controller' => 'AppointmentsController',
            'action' => 'index'
<<<<<<< HEAD
        ],
        'landingPageLoggedOut' => [
            'controller' => 'LandingPageLoggedOutController',
            'action' => 'index'
        ],
        'landingPageLoggedIn' => [
            'controller' => 'LandingPageLoggedInController',
            'action' => 'index'
        ],
        'aboutUs' => [
            'controller' => 'AboutUsController',
            'action' => 'index'
        ],
        'contactUs' => [
            'controller' => 'ContactUsController',
            'action' => 'index'
        ],
        'editProfile' => [
            'controller' => 'EditProfileController',
            'action' => 'index'
        ],
        'results' => [
            'controller' => 'ResultsController',
            'action' => 'index'
=======
>>>>>>> c36691912d89a9db114a920e7c1e40b0acfa5843
        ]

        // add more routes
    ];


    public function dispatch($url) {
        // Remove leading and trailing slashes
        $url = trim($url, '/');

        if (array_key_exists($url, $this->routes)) {
            $controllerName = '\\controllers\\' . $this->routes[$url]['controller'];
            $actionName = $this->routes[$url]['action'];

            $controller = new $controllerName();
            $controller->$actionName();

        } else {
            // Handle not found
            echo "404 Not Found";
        }
    }
}

?>