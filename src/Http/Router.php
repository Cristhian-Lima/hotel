<?php

declare(strict_types=1);

namespace Http;

use Exception\NotFoundException;
use State\StatusCode;

/**
 * Class Router
 * @author Felicidad Hilari
 */
class Router
{
  /**
   * @var array<Route>
   */
  private $routes;

  public function __construct()
  {
    $this->routes = [];
  }

  /**
   * Agrega una nueva ruta a la lista de rutas disponibles
   *
   * @return void
   */
  public function add(string $uri, string $method, $callback): void
  {
    array_push($this->routes, new Route($uri, $method, $callback));
  }

  /**
   * busca una ruta en la lista de rutas
   * asi como tambien que este sea del mismo methodo
   *
   * @param string $route
   * @param string $method
   *
   * @return ?Route
   */
  public function getRoute(string $uri, string $method): ?Route
  {
    foreach ($this->routes as $route) {
      if ($route->compare($uri, $method)) {
        return $route;
      }
    }

    /* en caso de no coincidir con alguna ruta, lanza una excepcion */
    throw new NotFoundException('La ruta no existe', StatusCode::NOT_FOUND);
  }
}
