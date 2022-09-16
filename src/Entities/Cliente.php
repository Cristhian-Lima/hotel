<?php

namespace Entities;

/**
 * Class Cliente
 * @author Felicidad Hilari
 */
class Cliente extends Entitie
{

  /**
   * @var int
   */
  private $CODIGO;

  /**
   * @var string
   */
  private $CARNET;

  /**
   * @var string
   */
  private $CORREO;

  /**
   * @var string
   */
  private $PASSWORD;

  /**
   * @var string
   */
  private $NOMBRES;

  /**
   * @var string
   */
  private $PATERNO;

  /**
   * @var string
   */
  private $MATERNO;

  /**
   * @var string
   */
  private $TELEFONO;

  /**
   * @var string
   */
  private $NACIONALIDAD;

  /**
   * Obtiene el valor de NACIONALIDAD
   *
   * @return string
   */
  public function getNacionalidad()
  {
    return $this->NACIONALIDAD;
  }

  /**
   * Establece el valor de NACIONALIDAD
   *
   * @param string $NACIONALIDAD
   *
   * @return Cliente
   */
  public function setNacionalidad(string $NACIONALIDAD)
  {
    $this->NACIONALIDAD = $NACIONALIDAD;
    return $this;
  }

  /**
   * Obtiene el valor de TELEFONO
   *
   * @return string
   */
  public function getTelefono()
  {
    return $this->TELEFONO;
  }

  /**
   * Establece el valor de TELEFONO
   *
   * @param string $TELEFONO
   *
   * @return Cliente
   */
  public function setTelefono(string $TELEFONO)
  {
    $this->TELEFONO = $TELEFONO;
    return $this;
  }

  /**
   * Obtiene el valor de MATERNO
   *
   * @return string
   */
  public function getMaterno()
  {
    return $this->MATERNO;
  }

  /**
   * Establece el valor de MATERNO
   *
   * @param string $MATERNO
   *
   * @return Cliente
   */
  public function setMaterno(string $MATERNO)
  {
    $this->MATERNO = $MATERNO;
    return $this;
  }

  /**
   * Obtiene el valor de PATERNO
   *
   * @return string
   */
  public function getPaterno()
  {
    return $this->PATERNO;
  }

  /**
   * Establece el valor de PATERNO
   *
   * @param string $PATERNO
   *
   * @return Cliente
   */
  public function setPaterno(string $PATERNO)
  {
    $this->PATERNO = $PATERNO;
    return $this;
  }

  /**
   * Obtiene el valor de NOMBRES
   *
   * @return string
   */
  public function getNombres()
  {
    return $this->NOMBRES;
  }

  /**
   * Establece el valor de NOMBRES
   *
   * @param string $NOMBRES
   *
   * @return Cliente
   */
  public function setNombres(string $NOMBRES)
  {
    $this->NOMBRES = $NOMBRES;
    return $this;
  }

  /**
   * Obtiene el valor de PASSWORD
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->PASSWORD;
  }

  /**
   * Establece el valor de PASSWORD
   *
   * @param string $PASSWORD
   *
   * @return Cliente
   */
  public function setPassword(string $PASSWORD)
  {
    $this->PASSWORD = $PASSWORD;
    return $this;
  }

  /**
   * Obtiene el valor de CORREO
   *
   * @return string
   */
  public function getCorreo()
  {
    return $this->CORREO;
  }

  /**
   * Establece el valor de CORREO
   *
   * @param string $CORREO
   *
   * @return Cliente
   */
  public function setCorreo(string $CORREO)
  {
    $this->CORREO = $CORREO;
    return $this;
  }

  /**
   * Obtiene el valor de CARNET
   *
   * @return string
   */
  public function getCarnet()
  {
    return $this->CARNET;
  }

  /**
   * Establece el valor de CARNET
   *
   * @param string $CARNET
   *
   * @return Cliente
   */
  public function setCarnet(string $CARNET)
  {
    $this->CARNET = $CARNET;
    return $this;
  }

  /**
   * Obtiene el valor de CODIGO
   *
   * @return int
   */
  public function getId()
  {
    return $this->CODIGO;
  }

  public function jsonSerialize(): array
  {
    return get_object_vars($this);
  }
}
