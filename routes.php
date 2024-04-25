<?php


$router->addGet('/public/', 'controllers/home.php');
$router->addGet('/public/listings', 'controllers/listings/index.php');
$router->addGet('/public/listings/publish', 'controllers/listings/publish.php');
?>
