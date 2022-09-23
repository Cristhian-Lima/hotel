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

  public function update(Cliente $cliente): bool
  {
    $connection = $this->database->connect();
    $query = "UPDATE CLIENTE SET
        CARNET = :carnet,
        CORREO = :correo,
        PASSWORD = :password,
        NOMBRES = :nombres,
        PATERNO = :paterno,
        MATERNO = :materno,
        TELEFONO = :telefono,
        NACIONALIDAD = :nacionalidad
      WHERE CODIGO = :codigo";
    $prepare = $connection->prepare($query);
    $dataClient = [
      "carnet" => $cliente->getCarnet(),
      "correo" => $cliente->getCorreo(),
      "password" => $cliente->getPassword(),
      "nombres" => $cliente->getNombres(),
      "paterno" => $cliente->getPaterno(),
      "materno" => $cliente->getMaterno(),
      "telefono" => $cliente->getTelefono(),
      "nacionalidad" => $cliente->getNacionalidad(),
      "codigo" => $cliente->getId()
    ];
    return $prepare->execute($dataClient);
  }
}
