<?php

namespace Entities;

/**
 * Class Reserva
 * @author Felicidad Hilari
 */
class Reserva extends Entitie
{
  /**
   * @var int
   */
  private $COD_RESERVA;

  /**
   * @var int
   */
  private $COD_HABITACION;

  /**
   * @var int
   */
  private $COD_CLIENTE;

  /**
   * @var string
   */
  private $FECHA_INICIO;

  /**
   * @var string
   */
  private $FECHA_FINAL;

  /**
   * @var string
   */
  private $FECHA_RESERVA;

  /**
   * @var int
   */
  private $COD_EMP;

  /**
   * Obtiene el valor de COD_EMP
   *
   * @return int
   */
  public function getCodEmpleado()
  {
    return $this->COD_EMP;
  }

  /**
   * Establece el valor de COD_EMP
   *
   * @param int $COD_EMP
   *
   * @return Reserva
   */
  public function setCodEmpleado(int $COD_EMP)
  {
    $this->COD_EMP = $COD_EMP;
    return $this;
  }

  /**
   * Obtiene el valor de FECHA_RESERVA
   *
   * @return string
   */
  public function getFecha()
  {
    return $this->FECHA_RESERVA;
  }

  /**
   * Establece el valor de FECHA_RESERVA
   *
   * @param string $FECHA_RESERVA
   *
   * @return Reserva
   */
  public function setFecha(string $FECHA_RESERVA)
  {
    $this->FECHA_RESERVA = $FECHA_RESERVA;
    return $this;
  }

  /**
   * Obtiene el valor de FECHA_FINAL
   *
   * @return string
   */
  public function getFechaFinal()
  {
    return $this->FECHA_FINAL;
  }

  /**
   * Establece el valor de FECHA_FINAL
   *
   * @param string $FECHA_FINAL
   *
   * @return Reserva
   */
  public function setFechaFinal(string $FECHA_FINAL)
  {
    $this->FECHA_FINAL = $FECHA_FINAL;
    return $this;
  }

  /**
   * Obtiene el valor de FECHA_INICIO
   *
   * @return string
   */
  public function getFechaInicio()
  {
    return $this->FECHA_INICIO;
  }

  /**
   * Establece el valor de FECHA_INICIO
   *
   * @param string $FECHA_INICIO
   *
   * @return Reserva
   */
  public function setFechaInicio(string $FECHA_INICIO)
  {
    $this->FECHA_INICIO = $FECHA_INICIO;
    return $this;
  }

  /**
   * Obtiene el valor de COD_CLIENTE
   *
   * @return int
   */
  public function getCodCliente()
  {
    return $this->COD_CLIENTE;
  }

  /**
   * Establece el valor de COD_CLIENTE
   *
   * @param int $COD_CLIENTE
   *
   * @return Reserva
   */
  public function setCodCliente(int $COD_CLIENTE)
  {
    $this->COD_CLIENTE = $COD_CLIENTE;
    return $this;
  }

  /**
   * Obtiene el valor de COD_HABITACION
   *
   * @return int
   */
  public function getCodHabitacion()
  {
    return $this->COD_HABITACION;
  }

  /**
   * Establece el valor de COD_HABITACION
   *
   * @param int $COD_HABITACION
   *
   * @return Reserva
   */
  public function setCodHabitacion(int $COD_HABITACION)
  {
    $this->COD_HABITACION = $COD_HABITACION;
    return $this;
  }

  /**
   * Obtiene el valor de COD_RESERVA
   *
   * @return int
   */
  public function getId()
  {
    return $this->COD_RESERVA;
  }

  /**
   * Establece el valor de COD_RESERVA
   *
   * @param int $COD_RESERVA
   *
   * @return Reserva
   */
  public function setId(int $COD_RESERVA)
  {
    $this->COD_RESERVA = $COD_RESERVA;
    return $this;
  }

  public function jsonSerialize(): array
  {
    return get_object_vars($this);
  }
}
