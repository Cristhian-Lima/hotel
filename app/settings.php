<?php
define('ROOT', __DIR__ . '/..');
define('SRC', ROOT . '/src/');
define('PATH_PUBLIC', ROOT . '/public/index.php');
define('ASSETS', ROOT . '/public');
define('PATH_SQL', ROOT . '/sql');
define('LOGGER', ROOT . '/logs/hotel-error.log');
define('VIEWS', SRC . 'Views/');

define('SERVER_HOST', 'http://' . $_SERVER['HTTP_HOST']);
/* Constantes para la base de datos */
define('DB_GESTOR', 'mysql');
define('DB_NAME', 'hotel');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
