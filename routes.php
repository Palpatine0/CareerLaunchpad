<?php

$router->addGet('/public/', 'HomeController@index');
$router->addGet('/public/listings', 'ListingController@index');
$router->addGet('/public/listings/search', 'ListingController@search');
$router->addGet('/public/listings/publish', 'ListingController@publish',['auth']);
$router->addGet('/public/listings/{id}', 'ListingController@detail');
$router->addPost('/public/listings', 'ListingController@store',['auth']);
$router->addDelete('/public/listings/{id}', 'ListingController@destroy',['auth']);
$router->addGet('/public/listings/edit/{id}', 'ListingController@edit',['auth']);
$router->addPut('/public/listings/{id}', 'ListingController@update',['auth']);

$router->addGet('/public/auth/login', 'UserController@login',['guest']);
$router->addGet('/public/auth/register', 'UserController@register',['guest']);
$router->addPost('/public/auth/register', 'UserController@store',['guest']);
$router->addPost('/public/auth/logout', 'UserController@logout');
$router->addPost('/public/auth/login', 'UserController@authenticate',['guest']);

?>
