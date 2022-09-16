<?php

namespace Controllers;

use Http\Request;
use Http\Response;
use Models\ClienteModel;
use State\StatusCode;

/**
 * Class ClienteController
 * @author Felicidad Hilari
 */
class ClienteController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->model = new ClienteModel();
  }

  public function getAll(Request $request, Response $response): Response
  {
    $this->view->setBasePath($request->getBasePath());

    $clientes = $this->model->getAll();

    $this->render('Cliente/index', ["clientes" => $clientes]);
    return $response->withStatusCode(StatusCode::OK);
  }
}
