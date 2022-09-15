<?php

namespace Controllers;

/**
 * Class Controller
 * @author Controller
 */
class Controller
{
  public function __construct()
  {
  }

  public function loadView(string $viewName)
  {
    $file = VIEWS . $viewName . '.php';
    require $file;
  }
}
