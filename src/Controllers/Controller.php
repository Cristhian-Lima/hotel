<?php

namespace Controllers;

use Views\View;

/**
 * Class Controller
 * @author Controller
 */
class Controller
{
  /**
   * @var View
   */
  private $view;

  public function __construct()
  {
    $this->view = new View();
  }

  public function render(string $viewName, array $data = [])
  {
    $this->view->render($viewName, $data);
  }
}
