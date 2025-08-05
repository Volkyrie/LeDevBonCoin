<?php
session_start();
require 'vendor/autoload.php';
require 'vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();

$router->setBasePath('/ledevboncoin');

//ADS ROUTES
$router->map( 'GET', '/', 'ControllerPage#homePage', 'homepage');
$router->map( 'GET|POST', '/postad', 'ControllerPage#postPage', 'postpage');

//USER ROUTES
$router->map( 'GET|POST', '/register', 'ControllerAuth#register', 'register');
$router->map( 'GET|POST', '/login', 'ControllerAuth#login', 'login');
$router->map( 'GET', '/logout', 'ControllerAuth#logout', 'logout');


$match = $router->match();

if(is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
    }
} else {
    http_response_code(404);
}