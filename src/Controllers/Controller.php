<?php

namespace Controllers;

use Models\CrudInterface;
use Models\Model;
use Views\View;

/**
 * Class Controller
 * @author Controller
 */
class Controller
{
  /**
   * @var CrudInterface
   */
  protected $model;

  /**
   * @var View
   */
  protected $view;

  public function __construct()
  {
    $this->view = new View();
  }

  public function render(string $viewName, array $data = [])
  {
    $this->view->render($viewName, $data);
  }
}
