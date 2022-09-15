<?php

namespace Controllers;

use Http\Request;
use Http\Response;
use State\StatusCode;

/**
 * Class LoginController
 * @author Felicidad Hilari
 */
class LoginController extends Controller
{
  public function login(Request $request, Response $response): Response
  {
    $this->render('Login/index', ["basepath" => $request->getBasePath()]);
    return $response->withStatusCode(StatusCode::OK);
  }

  public function auth(Request $request, Response $response): Response
  {
    $params = $request->getParams();
    $params = json_encode($params);

    $response->getBody()->write($params);
    return $response
      ->withStatusCode(StatusCode::OK)
      ->withHeader('Content-Type', 'application/json');
  }
}
