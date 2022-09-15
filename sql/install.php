<?php

use Database\Database;

require __DIR__ . '/../app/settings.php';
require __DIR__ . '/../app/autoload.php';

$database = new Database();
$connection = $database->connect();

try {
  succesMessage("[~] Reinstalando la base de datos");
  $connection->exec("DROP DATABASE " . DB_NAME);

  succesMessage("[~] Creando base de datos");
  $connection->exec("CREATE DATABASE " . DB_NAME);
  $connection->exec("USE " . DB_NAME);
  succesMessage("[OK] Base de datos creada");

  succesMessage("[~] Creando tablas");
  $connection->exec(file_get_contents(PATH_SQL . '/create_tables.sql'));
  succesMessage("[OK] Tablas creadas.");

  succesMessage("[~] Insertando datos");
  $connection->exec(file_get_contents(PATH_SQL . '/basic_data.sql'));
  succesMessage("[OK] Datos insertados.");
} catch (\PDOException $e) {
  errorMessage("[ERROR]" . $e->getMessage());
}

function errorMessage(string $message)
{
  print("\e[1;31m$message\e[0m" . PHP_EOL);
}
function succesMessage(string $message)
{
  print("\e[1;32m$message\e[0m" . PHP_EOL);
}
