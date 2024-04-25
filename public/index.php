<?php

//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../helpers.php';

require basePath('Database.php');
$config = require basePath('config/db.php');
$db = new Database($config);

require basePath('Router.php');
$router = new Router();


$routes = require basePath('routes.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
//inspect($uri);
//inspect($method);

?>