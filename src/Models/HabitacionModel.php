<?php

namespace Models;

use Entities\Entitie;
use Entities\Habitacion;

/**
 * Class HabitacionModel
 * @author Felicidad Hilari
 */
class HabitacionModel extends Model implements CrudInterface
{
  private const ENTITIE_NAME = 'HABITACION';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(): array
  {
    $resultOfQuery = $this->selectAllFrom(self::ENTITIE_NAME);

    return $resultOfQuery->fetchAll(\PDO::FETCH_CLASS, Habitacion::class);
  }

  public function get($id): ?Entitie
  {
    $resultOfQuery = $this->selectAllFromWhere(self::ENTITIE_NAME, "COD_HABITACION = :id");
    $resultOfQuery->execute(["id" => $id]);

    return $resultOfQuery->fetchObject(Habitacion::class);
  }
}
