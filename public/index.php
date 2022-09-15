<?php

use Controllers\HomeController;
use Controllers\LoginController;
use Http\App;

require __DIR__ . '/../app/settings.php';
require __DIR__ . '/../app/autoload.php';
require __DIR__ . '/../app/logger.php';

$basePath = str_replace('/' . basename(PATH_PUBLIC), '', $_SERVER['SCRIPT_NAME']);
$app = new App($basePath);

$app->get('/', HomeController::class);
$app->get('/login', [LoginController::class, 'login']);
$app->get('/user/{id}', function () {
  return "Desde una funcion anonima";
});

try {
  $app->run();
} catch (Exception $e) {
  echo $e->getMessage();
}
