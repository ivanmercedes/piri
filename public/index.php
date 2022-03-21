<?php

define("DATABASE_DIRECTORY",     __DIR__ . '/../storage');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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