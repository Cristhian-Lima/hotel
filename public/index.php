<?php

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

$app->post('/register', function (Request $req, Response $res) {
  $username = $req->getParam('username');
  $password = $req->getParam('password');
  $result = [
    "name" => $username,
    "pass" => $password
  ];
  $res->getBody()->write(json_encode($result));
  return $res->withHeader('Content-Type', 'application/json');
});

$app->run();
