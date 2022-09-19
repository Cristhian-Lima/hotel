<?php

use Controllers\ClienteController;
use Controllers\HabitacionController;
use Controllers\HomeController;
use Controllers\LoginController;
use Http\App;
use Http\Request;
use Http\Response;

require __DIR__ . '/../app/settings.php';
require __DIR__ . '/../app/autoload.php';
require __DIR__ . '/../app/logger.php';

$basePath = str_replace('/' . basename(PATH_PUBLIC), '', $_SERVER['SCRIPT_NAME']);
$app = new App($basePath);

$app->get('/', HomeController::class);

$app->get('/login', [LoginController::class, 'login']);
$app->post('/login', [LoginController::class, 'auth']);

$app->get('/register', [LoginController::class, 'register']);
$app->post('/register', [LoginController::class, 'save']);

$app->get('/habitaciones', [HabitacionController::class, 'getAll']);
$app->get('/clientes', [ClienteController::class, 'getAll']);

$app->get('/{name}', function (Request $request, Response $response, array $args) {
  $name = $args['name'];
  $response->getBody()->write("<h1>Hola $name</h1>");
  return $response;
});

$app->run();
