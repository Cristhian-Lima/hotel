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

  public function registrar(Reserva $reserva)
  {
    $connection = $this->database->connect();
    try {
      $connection->beginTransaction();
      $query = "INSERT INTO RESERVA
        (COD_HABITACION, COD_CLIENTE, FECHA_INICIO, FECHA_FINAL, FECHA_RESERVA)
      VALUES (:cod_habitacion, :cod_cliente, :inicio, :final, :fecha)";
      $params = [
        "cod_habitacion" => $reserva->getCodHabitacion(),
        "cod_cliente" => $reserva->getCodCliente(),
        "inicio" => $reserva->getFechaInicio(),
        "final" => $reserva->getFechaFinal(),
        "fecha" => $reserva->getFecha()
      ];

      $resultOfQuery = $connection->prepare($query);
      $resultOfQuery->execute($params);

      $query = "UPDATE HABITACION SET TIPO_DISPONIBILIDAD = :tipo WHERE COD_HABITACION = :id";
      $resultOfQuery = $connection->prepare($query);
      $resultOfQuery->execute(["tipo" => 'RESERVA', "id" => $reserva->getCodHabitacion()]);

      return $connection->commit();
    } catch (\Exception $e) {
      return $connection->rollBack();
    }
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

  public function getFrom($idCliente): array
  {
    $query = "SELECT
        COD_RESERVA,
        NUMERO,
        PISO,
        TIPO_HABITACION,
        FECHA_INICIO,
        FECHA_FINAL,
        FECHA_RESERVA
      FROM RESERVA R INNER JOIN HABITACION H ON R.COD_HABITACION = H.COD_HABITACION
      WHERE COD_CLIENTE = :id
      ORDER BY FECHA_RESERVA DESC
";
    $resultOfQuery = $this->query($query, ["id" => $idCliente]);

    return $resultOfQuery->fetchAll(\PDO::FETCH_CLASS, Reserva::class);
  }

  public function eliminar($id)
  {
    $query = "DELETE FROM " . self::ENTITIE_NAME . " WHERE COD_RESERVA = :id";
    $resultOfQuery = $this->query($query, ["id" => $id]);
    return $resultOfQuery;
  }
}
