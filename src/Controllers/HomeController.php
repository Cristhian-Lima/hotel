<?php

namespace Controllers;

use Http\Request;
use Http\Response;

/**
 * Class HomeController
 * @author Felicidad Hilari
 */
class HomeController extends Controller
{
  public function __invoke(Request $request, Response $response)
  {
    $this->render('Home/index');

    return $response
      ->withStatusCode(200);
  }
}
