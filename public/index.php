<?php

use Controllers\HomeController;
use Controllers\LoginController;
use Http\App;
use Http\Response;
use Tools\HashTool;

require __DIR__ . '/../app/settings.php';
require __DIR__ . '/../app/autoload.php';
require __DIR__ . '/../app/logger.php';

$basePath = str_replace('/' . basename(PATH_PUBLIC), '', $_SERVER['SCRIPT_NAME']);
$app = new App($basePath);

$app->get('/', HomeController::class);
$app->get('/login', [LoginController::class, 'login']);
$app->post('/login', [LoginController::class, 'auth']);

$app->get('/hash', function ($req, Response $response) {
  $pass = 'meli';
  $passHass = HashTool::hash($pass);
  $response->getBody()->write(json_encode(["pass" => $pass, "pass_hash" => $passHass]));
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
