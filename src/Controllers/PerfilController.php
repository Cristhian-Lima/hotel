<?php

declare(strict_types=1);

namespace Controllers;

use Http\Request;
use Http\Response;
use Http\Session;
use Models\ClienteModel;

/**
 * Class PerfilController
 * @author Felicidad Hilari
 */
class PerfilController extends Controller
{
  /**
   * @var Session
   */
  private $session;

  public function __construct(Session $session)
  {
    parent::__construct();
    $this->session = $session;
    $this->model = new ClienteModel();
  }

  public function perfil(Request $request, Response $response): Response
  {
    $cliente = $this->session->getCurrentClient();
    $this->view->setBasePath($request->getBasePath());
    $this->render('Cliente/perfil', ["cliente" => $cliente]);
    return $response;
  }
}
