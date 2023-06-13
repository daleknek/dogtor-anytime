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