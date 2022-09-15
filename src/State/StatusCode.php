<?php

namespace State;

/**
 * Class StatusCode
 * @author Felicidad Hilari
 */
class StatusCode
{
  /**
   * Exito
   */
  const OK = 200;

  /**
   * Recurso creado
   */
  const RESOURCE_CREATED = 201;

  /**
   * Argumentos invalidos o Mala peticion
   */
  const BAD_REQUEST = 400;

  /**
   * Acceso no autorizado
   */
  const UNAUTHORIZATE_ACCESS = 401;

  /**
   * Acceso prohibido
   */
  const ACCESS_FORBIDDEN = 403;

  /**
   * Recurso no encontrado
   */
  const NOT_FOUND = 404;

  /**
   * Error interno del servidor
   */
  const SERVER_ERROR = 500;
}
