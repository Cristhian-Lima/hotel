<?php

declare(strict_types=1);

namespace Http;

use Exception;
use State\StatusCode;

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
   * @var Router 
   */
  private $router;

  /**
   * @var string
   */
  protected $basePath;

  /**
   * @var ErrorManager
   */
  private $errorManager;



  public function __construct(string $basePath = '')
  {
    $this->router       = new Router();
    $this->request      = new Request($basePath);
    $this->response     = new Response();
    $this->errorManager = new ErrorManager();

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
    $this->router->add($route, 'GET', $callback);
  }

  public function post(string $route, $callback)
  {
    $this->router->add($route, 'POST', $callback);
  }

  private function send($callback, $args)
  {
    $response = call_user_func($callback, $this->request, $this->response, $args);

    $response->send();
    echo $response->getBody()->getContentBody();
  }

  private function getArgs(Route $route)
  {
    $res = preg_grep('/^\{[a-z]+\}$/', $route->getUriArray());
    $uri = $this->request->getUriArray();
    $res = array_map(function ($arg) {
      $arg = trim($arg, '{');
      $arg = trim($arg, '}');
      return $arg;
    }, $res);

    $arr = [];
    foreach ($res as $key => $arg) {
      $arr[$arg] = $uri[$key];
    }
    return $arr;
  }

  public function run()
  {
    try {
      $uriArray = $this->request->getUriArray();
      $method = $this->request->getMethod();

      $route = $this->router->getRoute($uriArray, $method);

      if (is_array($route->getCallback())) {
        [$className, $methodName] = $route->getCallback();

        if (!class_exists($className)) {
          throw new Exception('Class Not Found', StatusCode::NOT_FOUND);
        }
        if (!method_exists($className, $methodName)) {
          throw new Exception('Method Not Found', StatusCode::NOT_FOUND);
        }

        $controller = new $className();

        $this->send([$controller, $methodName], $this->getArgs($route));
      } else if (is_callable($route->getCallback())) {
        $this->send($route->getCallback(), $this->getArgs($route));
      } elseif (class_exists($route->getCallback())) {
        $controller = $route->getCallback();
        $controller = new $controller();

        $this->send($controller, $this->getArgs($route));
      }
    } catch (Exception $e) {
      $responseError = call_user_func($this->errorManager, $e, $this->getResponse());
      $responseError->send();
      echo $responseError->getBody()->getContentBody();
      error_log($e->getMessage());
    }
  }
}
