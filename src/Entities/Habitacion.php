<?php

namespace Entities;

/**
 * Class Habitacion
 * @author Felicidad Hilari
 */
class Habitacion extends Entitie
{

  /**
   * @var int
   */
  private $COD_HABITACION;

  /**
   * @var string
   */
  private $NUMERO;

  /**
   * @var int
   */
  private $PISO;

  /**
   * @var string
   */
  private $TIPO_DISPONIBILIDAD;

  /**
   * @var string
   */
  private $TIPO_HABITACION;

  /**
   * @var string
   */
  private $DESCRIPCION;

  /**
   * Obtiene el valor de DESCRIPCION
   *
   * @return string
   */
  public function getDescripcion()
  {
    return $this->DESCRIPCION;
  }

  /**
   * Establece el valor de DESCRIPCION
   *
   * @param string $DESCRIPCION
   *
   * @return Habitacion
   */
  public function setDescripcion(string $DESCRIPCION)
  {
    $this->DESCRIPCION = $DESCRIPCION;
    return $this;
  }

  /**
   * Obtiene el valor de TIPO_HABITACION
   *
   * @return string
   */
  public function getTipoHabitacion()
  {
    return $this->TIPO_HABITACION;
  }

  /**
   * Establece el valor de TIPO_HABITACION
   *
   * @param string $TIPO_HABITACION
   *
   * @return Habitacion
   */
  public function setTipoHabitacion(string $TIPO_HABITACION)
  {
    $this->TIPO_HABITACION = $TIPO_HABITACION;
    return $this;
  }

  /**
   * Obtiene el valor de TIPO_DISPONIBILIDAD
   *
   * @return string
   */
  public function getTipoDisponibilidad()
  {
    return $this->TIPO_DISPONIBILIDAD;
  }

  /**
   * Establece el valor de TIPO_DISPONIBILIDAD
   *
   * @param string $TIPO_DISPONIBILIDAD
   *
   * @return Habitacion
   */
  public function setTipoDisponibilidad(string $TIPO_DISPONIBILIDAD)
  {
    $this->TIPO_DISPONIBILIDAD = $TIPO_DISPONIBILIDAD;
    return $this;
  }

  /**
   * Obtiene el valor de PISO
   *
   * @return int
   */
  public function getPiso()
  {
    return $this->PISO;
  }

  /**
   * Establece el valor de PISO
   *
   * @param int $PISO
   *
   * @return Habitacion
   */
  public function setPiso(int $PISO)
  {
    $this->PISO = $PISO;
    return $this;
  }

  /**
   * Obtiene el valor de NUMERO
   *
   * @return string
   */
  public function getNumero()
  {
    return $this->NUMERO;
  }

  /**
   * Establece el valor de NUMERO
   *
   * @param string $NUMERO
   *
   * @return Habitacion
   */
  public function setNumero(string $NUMERO)
  {
    $this->NUMERO = $NUMERO;
    return $this;
  }

  /**
   * Obtiene el valor de COD_HABITACION
   *
   * @return int
   */
  public function getId()
  {
    return $this->COD_HABITACION;
  }

  public function jsonSerialize(): array
  {
    return get_object_vars($this);
  }
}
