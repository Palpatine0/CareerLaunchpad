<?php

$routes = [
    '/public/' => 'controllers/home.php',
    '/public/listings' => 'controllers/listings/index.php',
    '/public/listings/publish' => 'controllers/listings/publish.php',
    '/public/404' => 'controllers/error/404.php'
];

return $routes;
?>
