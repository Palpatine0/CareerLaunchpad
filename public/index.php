<?php

//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../helpers.php';

$routes = [
    '/public/' => 'controllers/home.php',
    '/public/listings' => 'controllers/listings/index.php',
    '/public/listings/publish' => 'controllers/listings/publish.php',
    '/public/404' => 'controllers/error/404.php'
];

$uri = $_SERVER['REQUEST_URI'];
//inspectAndDie($uri);
if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
} else {
//    var_dump("asshole");
    require(basePath($routes['/public/404']));
}

?>