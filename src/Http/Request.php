<?php

declare(strict_types=1);

namespace Http;

/**
 * Class Request
 * @author Felicidad Hilari
 */
class Request
{
  /**
   * @var string
   */
  protected $method;

  /**
   * @var string
   */
  protected $uri;

  /**
   * @var array<string>
   */
  protected $headers;

  /**
   * @var string
   */
  protected $basePath;


  public function __construct(string $basePath = '')
  {
    $this->setBasePath($basePath);
    $this->setMethod($_SERVER['REQUEST_METHOD']);
    $this->setUri($_SERVER['REQUEST_URI']);
    $this->setHeaders(getallheaders());
  }

  /**
   * Getter for basePath
   *
   * @return string
   */
  public function getBasePath(): string
  {
    return $this->basePath;
  }

  /**
   * Setter for basePath
   *
   * @param string $basePath
   * @return Request
   */
  public function setBasePath(string $basePath)
  {
    $this->basePath = $basePath;

    return $this;
  }

  /**
   * Setter for method
   *
   * @param string $method
   * @return Request
   */
  public function setMethod($method)
  {
    $this->method = $method;

    return $this;
  }

  /**
   * Getter for method
   *
   * @return string
   */
  public function getMethod(): string
  {
    return $this->method;
  }

  /**
   * Getter for uri
   *
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }

  /**
   * Setter for uri
   *
   * @param string $uri
   * @return Request
   */
  public function setUri(string $uri)
  {
    $this->uri = str_replace($this->getBasePath(), '', $uri);

    return $this;
  }

  /**
   * Getter for headers
   *
   * @return string
   */
  public function getHeaders(): array
  {
    return $this->headers;
  }

  /**
   * Obtiene una cabecera en especifico
   *
   * @return string
   */
  public function getHeader(string $headerName): string
  {
    return $this->headers[$headerName];
  }

  /**
   * Setter for headers
   *
   * @param array $headers
   * @return Request
   */
  public function setHeaders(array $headers)
  {
    $this->headers = $headers;

    return $this;
  }
}
