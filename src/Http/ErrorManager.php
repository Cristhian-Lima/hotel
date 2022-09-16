<?php

namespace Http;

use Throwable;

/**
 * Class ErrorManager
 * @author Felicidad Hilari
 */
class ErrorManager
{
  public function __invoke(Throwable $exception, Response $response): Response
  {
    $shortName = new \ReflectionClass($exception);
    $payload = [
      "code" => $this->parseStatusCode($exception),
      "message" => $exception->getMessage(),
      "exception" => $shortName->getShortName()
    ];

    $response->getBody()->write(json_encode($payload));
    return $response
      ->withStatusCode($this->parseStatusCode($exception))
      ->withHeader('Content-Type', 'application/json');
  }

  private function parseStatusCode(Throwable $exception)
  {
    $code = 500;
    if ($exception->getCode() >= 400 && $exception->getCode() <= 500)
      $code = $exception->getCode();

    return $code;
  }
}
