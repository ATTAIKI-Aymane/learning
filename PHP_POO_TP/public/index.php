<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

// define routes (method, path, handler "Controller@action")
$router->get('/', 'App\\Controller\\PostController@index');
$router->get('/posts', 'App\\Controller\\PostController@index');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);