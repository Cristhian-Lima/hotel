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
    $this->loadView('Home');
    $headers = $request->getHeaders();
    $response->getBody()->write(json_encode($headers));
    return $response
      ->withStatusCode(200)
      ->withHeader('Content-Type', 'application/json');
  }
}
