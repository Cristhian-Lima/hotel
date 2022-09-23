<?php

declare(strict_types=1);

namespace Controllers;

use DateInterval;
use DateTime;
use Entities\Reserva;
use Exception;
use Http\Request;
use Http\Response;
use Http\Session;
use Models\ReservaModel;
use State\StatusCode;

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

  public function registrar(Request $request, Response $response, array $args): Response
  {
    $this->view->setBasePath($request->getBasePath());
    $this->render('Reserva/registrar', ["cod_habitacion" => $args['id']]);
    return $response;
  }

  public function registrarConfirm(Request $request, Response $response): Response
  {

    $numDias = $request->getParam('num_dias');
    $intervalDate = new DateInterval("P{$numDias}D");
    $fecha_actual = new DateTime(date('Y-m-d'));
    $fecha_inicio = new DateTime($request->getParam('inicio'));
    $fecha_final = new DateTime($request->getParam('inicio'));
    $fecha_final->add($intervalDate);

    $reserva = new Reserva();
    $reserva->setCodHabitacion((int) $request->getParam('cod_habitacion'));
    $reserva->setCodCliente($this->session->getCurrentClient()->getId());
    $reserva->setFechaInicio($fecha_inicio->format('Y-m-d'));
    $reserva->setFechaFinal($fecha_final->format('Y-m-d'));
    $reserva->setFecha($fecha_actual->format('Y-m-d'));

    if (!$this->model->registrar($reserva))
      throw new Exception('No se pudo realizar la reserva', StatusCode::BAD_REQUEST);

    return $response->withHeader('Location', SERVER_HOST . $request->getBasePath() . '/habitaciones');
  }

  public function getAll(Request $request, Response $response): Response
  {
    $cliente = $this->session->getCurrentClient();
    $reservasDelCliente = $this->model->getFrom($cliente->getId());
    $this->view->setBasePath($request->getBasePath());
    $this->render('Reserva/index', ["reservas" => $reservasDelCliente]);
    return $response;
  }

  public function eliminar(Request $request, Response $response, array $args): Response
  {
    $this->view->setBasePath($request->getBasePath());
    $this->render('Reserva/eliminar', ["id" => $args['id']]);
    return $response;
  }

  public function eliminarConfirm(Request $request, Response $response, array $args): Response
  {
    if (!$this->model->eliminar($args['id']))
      throw new Exception('No se pudo eliminar la reserva', StatusCode::BAD_REQUEST);
    return $response->withHeader('Location', SERVER_HOST . $request->getBasePath() . '/reservas');
  }
}
