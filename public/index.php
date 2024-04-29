<?php
//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//error inspect


require __DIR__.'./../vendor/autoload.php';

require '../helpers.php';

use Framework\Router;

//spl_autoload_register(function ($class) {
//    $path = basePath('Framework/' . $class . '.php');
//    if (file_exists($path)) {
//        require $path;
//    }
//});

$router = new Router();


$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

?>