<?php

//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$routes = require basePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
//inspectAndDie($uri);
//inspectAndDie($routes);
if (array_key_exists($uri, $routes) && file_exists(basePath($routes[$uri]))) {
    require(basePath($routes[$uri]));
} else {
    http_response_code(404);
    require(basePath($routes['/public/404']));
}
?>