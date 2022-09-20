<?php

namespace Views;

use Exception\NotFoundException;
use State\StatusCode;

/**
 * Class View
 * @author Felicidad Hilari
 */
class View
{
  /**
   * @var array
   */
  private $data;

  /**
   * @var string
   */
  private $basePath;

  public function __construct(string $basePath = '')
  {
    $this->data = [];
    $this->setBasePath($basePath);
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
   * @return View
   */
  public function setBasePath(string $basePath)
  {
    $this->basePath = $basePath;
    return $this;
  }

  public function has(string $name)
  {
    return isset($this->data[$name]);
  }

  /**
   * Getter for data
   *
   * @return string
   */
  public function get(string $name)
  {
    return $this->data[$name];
  }

  /**
   * Methodo para pintar 
   *
   * @return void
   */
  public function render(string $viewName, array $data = []): void
  {
    $this->data = $data;
    $viewFile = VIEWS . $viewName . '.php';
    if (!file_exists($viewFile)) {
      throw new NotFoundException("No existe la vista para $viewName", StatusCode::NOT_FOUND);
    }
    require $viewFile;
  }
}
