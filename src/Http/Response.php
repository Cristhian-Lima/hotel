<?php

namespace Http;

/**
 * Class Response
 * @author Felicidad Hilari
 */
class Response
{
  /**
   * @var array<string>
   */
  protected $headers;

  /**
   * @var int
   */
  protected $statusCode;

  /**
   * @var BodyResponse
   */
  private $body;

  public function __construct()
  {
    $this->body = new BodyResponse();
    $this->setHeaders(apache_response_headers());
    $this->withStatusCode(200);
  }


  /**
   * Obtiene el valor de headers
   *
   * @return array<string>
   */
  public function getAllHeaders(): array
  {
    return $this->headers;
  }

  /**
   * Setter for headers
   *
   * @param array $headers
   * @return Response
   */
  private function setHeaders(array $headers)
  {
    $this->headers = $headers;

    return $this;
  }

  /**
   * Establece el valor de headers
   *
   * @param array<string> $headers
   *
   * @return Response
   */
  public function withHeader(string $headerName, string $value)
  {
    $this->headers[$headerName] = $value;
    return $this;
  }

  /**
   * Setter for statusCode
   *
   * @param int $statusCode
   * @return Response
   */
  public function withStatusCode($statusCode)
  {
    $this->statusCode = $statusCode;

    return $this;
  }

  /**
   * Getter for statusCode
   *
   * @return int
   */
  public function getStatusCode(): int
  {
    return $this->statusCode;
  }

  /**
   * Getter for body
   *
   * @return BodyResponse
   */
  public function getBody()
  {
    return $this->body;
  }

  public function send()
  {
    foreach ($this->getAllHeaders() as $headerName => $headerValue) {
      if ($headerName === 'Location') {
        header("$headerName: $headerValue");
        die();
      }
      header("$headerName: $headerValue");
    }
    http_response_code($this->getStatusCode());
  }
}
