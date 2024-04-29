<?php
//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//error inspect


require '../helpers.php';

require basePath('Framework/Database.php');
require basePath('Framework/Router.php');

$router = new Router();


$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

?>