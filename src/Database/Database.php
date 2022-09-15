<?php

declare(strict_types=1);

namespace Database;

/**
 * Class Database
 * @author Felicidad Hilari
 */
class Database
{
  private $db_gestor;
  private $db_name;
  private $db_host;
  private $db_user;
  private $db_password;

  public function __construct()
  {
    $this->db_gestor    = DB_GESTOR;
    $this->db_name      = DB_NAME;
    $this->db_host      = DB_HOST;
    $this->db_user      = DB_USER;
    $this->db_password  = DB_PASSWORD;
  }

  /**
   * Devuelve la conexion si tuvo exito al conectarse con la base de datos
   * @return \PDO | void
   */
  public function connect()
  {
    try {
      $db_url = "{$this->db_gestor}:host={$this->db_host};dbname={$this->db_name}";
      $dbh = new \PDO($db_url, $this->db_user, $this->db_password);
      $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      return $dbh;
    } catch (\PDOException $e) {
      error_log("[DATABASE]: " . $e->getMessage());
    }
  }
}
