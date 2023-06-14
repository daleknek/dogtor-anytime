<?php
// Starting a new session or resuming the existing session
session_start();
?>

<!-- Check if user is logged in before accessing profile
    if ($controllerName === 'Profile' && !isset($_SESSION['user'])) die('Unauthorized'); -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dogtor Anytime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    require_once str_replace('\\', '/', $class) . '.php';
});

// $controllerName = $_GET['controller'] ?? 'Home';
// $actionName = $_GET['action'] ?? 'index';

// Check if user is logged in before accessing profile
// if ($controllerName === 'Profile' && !isset($_SESSION['user'])) die('Unauthorized');

// $controllerName = '\\controllers\\' . ucfirst($controllerName) . 'Controller';

// if (!class_exists($controllerName)) {
//     die('Controller does not exist');
// }

// $controller = new $controllerName();

// if (!method_exists($controller, $actionName)) {
//     die('Action does not exist');
// }

// $controller->$actionName();

// Create router
$router = new Router();

// Dispatch
$router->dispatch($_GET['route'] ?? 'home');

?>

</body>
</html>