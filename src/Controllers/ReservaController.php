<?php

declare(strict_types=1);

namespace Controllers;

use Http\Request;
use Http\Response;
use Http\Session;
use Models\ReservaModel;

/**
 * Class ReservaController
 * @author Felicidad Hilari
 */
class ReservaController extends Controller
{
  /**
   * @var Session
   */
  private $session;

  public function __construct(Session $session)
  {
    parent::__construct();
    $this->model = new ReservaModel();
    $this->session = $session;
  }

  public function getAll(Request $request, Response $response): Response
  {
    $cliente = $this->session->getCurrentClient();
    $reservasDelCliente = $this->model->getFrom($cliente->getId());
    $this->view->setBasePath($request->getBasePath());
    $this->render('Reserva/index', ["reservas" => $reservasDelCliente]);
    return $response;
  }
}
