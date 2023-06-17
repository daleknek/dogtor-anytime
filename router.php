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
        ],

        'clinic/{vetId}' => [
            'controller' => 'ClinicController',
            'action' => 'index'
        ]

        // add more routes
      ];


    // public function dispatch($url) {
    //     // Remove leading and trailing slashes
    //     $url = trim($url, '/');

    //     if (array_key_exists($url, $this->routes)) {
    //         $controllerName = '\\controllers\\' . $this->routes[$url]['controller'];
    //         $actionName = $this->routes[$url]['action'];

    //         $controller = new $controllerName();
    //         $controller->$actionName();

    //     } else {
    //         // Handle not found
    //         echo "404 Not Found";
    //     }
    // }


    public function dispatch($url) {
        // Remove leading and trailing slashes
            $url = trim($url, '/');
    
        // Split the URL into segments
            $urlSegments = explode('/', $url);
    
        // Match routes
            foreach ($this->routes as $route => $routeConfig) {
            $routeSegments = explode('/', $route);
            if (count($urlSegments) === count($routeSegments)) {
                // If route segments count match url segments count, check each segment
                $params = [];
                for ($i = 0; $i < count($urlSegments); $i++) {
                    // If a route segment starts with '{' and ends with '}', it's a parameter
                    if (isset($routeSegments[$i][0]) && $routeSegments[$i][0] === '{' && substr($routeSegments[$i], -1) === '}') {
                        $params[] = $urlSegments[$i];
                    } elseif ($routeSegments[$i] !== $urlSegments[$i]) {
                        // If a segment is not a parameter and it does not match the URL segment, this route does not match the URL
                        continue 2;
                    }
                }
    
                // If we reach this point, it means the route matches the URL
                $controllerName = '\\controllers\\' . $routeConfig['controller'];
                $actionName = $routeConfig['action'];
    
                $controller = new $controllerName();
                // Pass params to the action
                call_user_func_array([$controller, $actionName], $params);
                return;
            }
        }
    
        // Handle not found
        echo "404 Not Found";
    }
    


}

?>