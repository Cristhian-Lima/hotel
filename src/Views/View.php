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
