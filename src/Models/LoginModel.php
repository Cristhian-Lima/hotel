<?php

namespace Models;

use Entities\Cliente;

/**
 * Class LoginModel
 * @author Felicidad Hilari
 */
class LoginModel extends Model
{
  private const ENTITIE_LOGIN = 'CLIENTE';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * devuelve un objeto de tipo CLiente si encuentra al cliente
   *
   * @return Cliente
   */
  public function login(string $email): Cliente
  {
    $resultOfQuery = $this->selectAllFromWhere(self::ENTITIE_LOGIN, "CORREO = :email");
    $resultOfQuery->execute(["email" => $email]);

    return $resultOfQuery->fetchObject(Cliente::class);
  }

  public function save(Cliente $cliente)
  {
    $connection = $this->database->connect();
    $query = "INSERT INTO " . self::ENTITIE_LOGIN . "(CARNET, CORREO, PASSWORD, NOMBRES, PATERNO, MATERNO, TELEFONO, NACIONALIDAD)
              VALUES (:carnet, :correo, :password, :nombres, :paterno, :materno, :telefono, :nacionalidad)";
    $values = [
      "carnet" => $cliente->getCarnet(),
      "correo" => $cliente->getCorreo(),
      "password" => $cliente->getPassword(),
      "nombres" => $cliente->getNombres(),
      "paterno" => $cliente->getPaterno(),
      "materno" => $cliente->getMaterno(),
      "telefono" => $cliente->getTelefono(),
      "nacionalidad" => $cliente->getNacionalidad()
    ];

    $resultOfQuery = $connection->prepare($query);
    return $resultOfQuery->execute($values);
  }
}
