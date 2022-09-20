<?php

namespace Http;

use Entities\Cliente;

/**
 * Class Session
 * @author Felicidad Hilari
 */
class Session
{
  /**
   * nombre de la session
   */
  private const SESSION_NAME = 'cliente';

  public function __construct()
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Verifica si existe una session
   *
   * @return bool
   */
  public function hasSession(): bool
  {
    return isset($_SESSION[self::SESSION_NAME]);
  }

  /**
   * Establece una session
   *
   * @return 
   */
  public function setCurrentClient(Cliente $cliente): Session
  {
    $_SESSION[self::SESSION_NAME] = serialize($cliente);
    return $this;
  }

  /**
   * Obtiene el cliente actual dentro de la sesion
   *
   * @return Cliente
   */
  public function getCurrentClient(): Cliente
  {
    return unserialize($_SESSION[self::SESSION_NAME]);
  }

  /**
   * Elimina y cierra todas las sesiones
   *
   * @return Session
   */
  public function closeSession(): Session
  {
    session_unset();
    session_destroy();
    return $this;
  }
}
