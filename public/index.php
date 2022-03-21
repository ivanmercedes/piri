<?php

require('../vendor/autoload.php');

use Phroute\Phroute\RouteCollector;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

$router->controller('/', App\Controllers\HomeController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $router);


echo $response;