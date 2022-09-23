<?php

declare(strict_types=1);

namespace Models;

use Entities\Entitie;
use Entities\Reserva;

/**
 * Class ReservaModel
 * @author Felicidad Hilari
 */
class ReservaModel extends Model implements CrudInterface
{

  /**
   * Nombre de la entidad
   */
  private const ENTITIE_NAME = 'RESERVA';

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll(): array
  {
    $resultOfQuery = $this->selectAllFrom(self::ENTITIE_NAME);
    return $resultOfQuery->fetchAll(\PDO::FETCH_CLASS, Reserva::class);
  }

  public function get($id): ?Entitie
  {
    $resultOfQuery = $this->selectAllFromWhere(self::ENTITIE_NAME, "COD_RESERVA= :cod");
    $resultOfQuery->execute(["cod" => $id]);

    return $resultOfQuery->fetchObject(Reserva::class);
  }

  public function getFrom($idCliente)
  {
    $resultOfQuery = $this->selectAllFromWhere(self::ENTITIE_NAME, "COD_CLIENTE = :cod");
    $resultOfQuery->execute(["cod" => $idCliente]);

    return $resultOfQuery->fetchAll(\PDO::FETCH_CLASS, Reserva::class);
  }
}
