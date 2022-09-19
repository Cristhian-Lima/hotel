<?php

namespace Controllers;

use Http\Request;
use Http\Response;
use State\StatusCode;

/**
 * Class HomeController
 * @author Felicidad Hilari
 */
class HomeController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function __invoke(Request $request, Response $response)
  {
    $this->view->setBasePath($request->getBasePath());

    $response->getBody()->write(json_encode($request->getUriArray()));
    $this->render('Home/index');
    return $response
      ->withStatusCode(StatusCode::OK);
  }
}
