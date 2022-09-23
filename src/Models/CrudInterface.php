<?php

namespace Models;

use Entities\Entitie;

/**
 * Class CrudInterface
 * @author Felicidad Hilari
 */
interface CrudInterface
{
  /**
   * Devuelve un array de objetos Entitie con todas la filas de la entidad
   *
   * @return array<Entitie>;
   */
  public function getAll(): array;

  /**
   * Devuelve un objeto con el id requerido
   * false en caso contrario
   *
   * @return ?Entitie | bool
   */
  public function get($id): ?Entitie;

  /**
   * OBtiene los datos de aqcuerdo a un ID
   *
   * @return array
   */
  public function getFrom($id): array;
}
