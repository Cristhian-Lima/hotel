<?php

use Controllers\ClienteController;
use Controllers\HabitacionController;
use Controllers\HomeController;
use Controllers\LoginController;
use Controllers\PerfilController;
use Controllers\ReservaController;
use Http\App;

require __DIR__ . '/../app/settings.php';
require __DIR__ . '/../app/autoload.php';
require __DIR__ . '/../app/logger.php';

$basePath = str_replace('/' . basename(PATH_PUBLIC), '', $_SERVER['SCRIPT_NAME']);
$app = new App($basePath);

$app->get('/', HomeController::class);

$app->get('/login', [LoginController::class, 'login']);
$app->get('/logout', [LoginController::class, 'logout']);
$app->post('/login', [LoginController::class, 'auth']);

$app->get('/register', [LoginController::class, 'register']);
$app->post('/register', [LoginController::class, 'save']);

$app->get('/habitaciones', [HabitacionController::class, 'getAll']);
$app->get('/reservas', [ReservaController::class, 'getAll']);
$app->get('/reservas/registrar/{id}', [ReservaController::class, 'registrar']);
$app->post('/reservas/registrar', [ReservaController::class, 'registrarConfirm']);
$app->get('/reservas/eliminar/{id}', [ReservaController::class, 'eliminar']);
$app->post('/reservas/eliminar/{id}', [ReservaController::class, 'eliminarConfirm']);

$app->get('/perfil', [PerfilController::class, 'perfil']);
$app->get('/perfil/edit', [PerfilController::class, 'edit']);
$app->post('/perfil/edit', [PerfilController::class, 'update']);

$app->run();
