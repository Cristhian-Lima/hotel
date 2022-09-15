<?php

declare(strict_types=1);

namespace Http;

/**
 * Class Route
 * @author Felicidad Hilari
 */
class Route
{
  /**
   * @var string
   */
  private $uri;

  /**
   * @var string
   */
  private $method;

  /**
   * @var callable | string
   */
  private $callback;

  public function __construct(string $uri, string $method, $callback)
  {
    $this->setUri($uri);
    $this->setMethod($method);
    $this->setCallback($callback);
  }

  /**
   * Obtiene el valor de callback
   *
   * @return callable | string
   */
  public function getCallback()
  {
    return $this->callback;
  }

  /**
   * Establece el valor de callback
   *
   * @param callable | string $callback
   *
   * @return Route
   */
  public function setCallback($callback)
  {
    $this->callback = $callback;
    return $this;
  }

  /**
   * Obtiene el valor de method
   *
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }

  /**
   * Establece el valor de method
   *
   * @param string $method
   *
   * @return Route
   */
  public function setMethod(string $method)
  {
    $this->method = strtoupper($method);
    return $this;
  }

  /**
   * Obtiene el valor de uri
   *
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }

  /**
   * Establece el valor de uri
   *
   * @param string $uri
   *
   * @return Route
   */
  public function setUri(string $uri)
  {
    $this->uri = $uri;
    return $this;
  }

  /**
   * Compara la url y el metodo
   * si es igual a los atributos del objetos devuelve true
   *
   * @param string $uri
   * @param string $method
   *
   * @return bool
   */
  public function compare(string $uri, string $method): bool
  {
    return $this->getUri() === $uri && $this->getMethod() === strtoupper($method);
  }
}
