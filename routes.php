<?php
$router->addGet('/public/', 'HomeController@index');
//$router->addGet('/public/listings', 'controllers/listings/index.php');
//$router->addGet('/public/listings/publish', 'controllers/listings/publish.php');
//$router->addGet('/public/listings/detail', 'controllers/listings/detail.php');
$router->addGet('/public/listings', 'ListingController@index');
$router->addGet('/public/listings/publish', 'ListingController@publish');
$router->addGet('/public/listings/{id}', 'ListingController@detail');
$router->addPost('/public/listings', 'ListingController@store');
$router->addDelete('/public/listings/{id}', 'ListingController@destroy');
?>
