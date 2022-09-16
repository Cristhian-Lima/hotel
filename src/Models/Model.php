<?php

namespace Models;

use Database\Database;
use PDOStatement;

/**
 * Class Model
 * @author Felicidad Hilari
 */
class Model
{
  /**
   * @var Database
   */
  protected $database;

  public function __construct()
  {
    $this->database = new Database();
  }

  protected function selectAllFrom(string $tableName): PDOStatement
  {
    $connection = $this->database->connect();
    $query = "SELECT * FROM $tableName";
    $prepare = $connection->prepare($query);
    $prepare->execute();

    return $prepare;
  }

  /**
   * undocumented function
   *
   * @return PDOStatement
   */
  protected function selectAllFromWhere(string $tableName, string $conditionWhere): PDOStatement
  {
    $connection = $this->database->connect();
    $query = "SELECT * FROM $tableName WHERE $conditionWhere";

    return $connection->prepare($query);
  }
}
