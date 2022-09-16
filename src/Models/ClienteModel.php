<?php

namespace Models;

use Entities\Cliente;
use Entities\Entitie;

/**
 * Class ClienteModel
 * @author Felicidad Hilari
 */
class ClienteModel extends Model implements CrudInterface
{
  private const ENTITIE_NAME = 'CLIENTE';
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(): array
  {
    $resultOfQuery = $this->selectAllFrom(self::ENTITIE_NAME);

    return $resultOfQuery->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
  }

  public function get($id): ?Entitie
  {
    $resultOfQuery = $this->selectAllFromWhere(self::ENTITIE_NAME, "CODIGO = :id");
    $resultOfQuery->execute(["id" => $id]);

    return $resultOfQuery->fetchObject(Cliente::class);
  }
}
