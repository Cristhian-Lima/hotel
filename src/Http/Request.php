<?php

declare(strict_types=1);

namespace Http;

use Exception;
use Exception\HttpRequestException;
use State\StatusCode;

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

  /**
   * @var array<string>
   */
  private $params;

  /**
   * @var array<string>
   */
  private $queryParams;

  public function __construct(string $basePath = '')
  {
    $this->setBasePath($basePath);
    $this->setMethod($_SERVER['REQUEST_METHOD']);
    $this->setUri($_SERVER['REQUEST_URI']);
    $this->setHeaders(getallheaders());
    $this->setParams($_POST);
    $this->setQueryParams($_GET);
  }

  /**
   * Getter for queryParam
   *
   * @return string
   */
  public function getQueryParam(string $queryParamName): string
  {
    if (!array_key_exists($queryParamName, $this->queryParams))
      throw new HttpRequestException("El parametro '$queryParamName' no existe", StatusCode::BAD_REQUEST);

    return $this->queryParams[$queryParamName];
  }

  /**
   * Obtiene el valor de queryParams
   *
   * @return array<string>
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }

  /**
   * Establece el valor de queryParams
   *
   * @param array<string> $queryParams
   *
   * @return Request
   */
  public function setQueryParams(array $queryParams)
  {
    $this->queryParams = $queryParams;
    return $this;
  }

  /**
   * Getter for param
   *
   * @return string
   */
  public function getParam(string $paramName): ?string
  {
    if (!array_key_exists($paramName, $this->params))
      throw new HttpRequestException("El nombre del parametro '$paramName' no existe", StatusCode::BAD_REQUEST);

    return $this->params[$paramName];
  }

  /**
   * Obtiene el valor de params
   *
   * @return array
   */
  public function getParams()
  {
    return $this->params;
  }

  /**
   * Establece el valor de params
   *
   * @param array $params
   *
   * @return Request
   */
  public function setParams(array $params)
  {
    $this->params = $params;
    return $this;
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
   * @return array
   */
  public function getUriArray(): array
  {
    [$uri] = explode('?', $this->uri);
    return explode('/', trim($uri, '/'));
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
