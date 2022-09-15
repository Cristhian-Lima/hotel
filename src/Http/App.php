<?php

declare(strict_types=1);

namespace Http;

use Exception;

/**
 * Class App
 * @author Felicidad Hilari
 */
class App
{
  /**
   * @var Request
   */
  private $request;

  /**
   * @var Response
   */
  private $response;


  /**
   * @var string
   */
  protected $basePath;

  /** @var string */
  private $route;

  /**
   * @var array<string>
   */
  private $routes;


  public function __construct(string $basePath = '')
  {
    $this->request = new Request($basePath);
    $this->response = new Response();

    $this->setbasePath($basePath);
  }

  /**
   * Obtiene el valor de basePath
   *
   * @return string
   */
  public function getBasePath()
  {
    return $this->basePath;
  }

  /**
   * Establece el valor de basePath
   *
   * @param string $basePath
   *
   * @return App
   */
  public function setBasePath(string $basePath)
  {
    $this->request->setBasePath($basePath);
    $this->basePath = $basePath;
    return $this;
  }

  private function getRoute($route)
  {
    return $this->getRoutes()[$route];
  }

  /**
   * Getter for routes
   *
   * @return array
   */
  public function getRoutes(): array
  {
    return $this->routes;
  }

  /**
   * Getter for request
   *
   * @return Request
   */
  public function getRequest(): Request
  {
    return $this->request;
  }

  /**
   * Setter for request
   *
   * @param Request $request
   * @return App
   */
  public function setRequest(Request $request)
  {
    $this->request = $request;

    return $this;
  }

  /**
   * Getter for response
   *
   * @return Response
   */
  public function getResponse(): Response
  {
    return $this->response;
  }

  /**
   * Setter for response
   *
   * @param Response $response
   * @return App
   */
  public function setResponse(Response $response)
  {
    $this->response = $response;

    return $this;
  }


  public function get(string $route, $callback)
  {
    $this->routes[$route] = $callback;
  }

  public function run()
  {
    $uri = $this->request->getUri();

    $routeAction = $this->getRoute($uri);

    if (is_null($routeAction))
      throw new \Exception('Route not found', 404);

    $response = $this->getResponse();
    if (is_callable($routeAction)) {
      $response = call_user_func($routeAction, $this->request, $this->response);
    } elseif (is_array($routeAction)) {
      [$className, $methodName] = $routeAction;

      if (!class_exists($className)) {
        throw new Exception('Class Not Founc', 404);
      }
      if (!method_exists($className, $methodName)) {
        throw new Exception('Method Not Founc', 404);
      }

      $controller = new $className();
      $response = call_user_func([$controller, $methodName], $this->request, $this->response);

      $response->send();
      echo $response->getBody()->getContentBody();
    } elseif (class_exists($routeAction)) {
      $controller = new $routeAction();
      $response = call_user_func($controller, $this->request, $this->response);

      $response->send();
      echo $response->getBody()->getContentBody();
    }
  }
}
