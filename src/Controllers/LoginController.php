<?php

namespace Controllers;

use Http\Request;
use Http\Response;

/**
 * Class LoginController
 * @author Felicidad Hilari
 */
class LoginController extends Controller
{
  public function login(Request $request, Response $response): Response
  {
    $response->getBody()->write('Hicimos login');
    return $response->withStatusCode(200);
  }
}
