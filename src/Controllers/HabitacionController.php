<?php

namespace Controllers;

use Exception\NotFoundException;
use Http\Request;
use Http\Response;
use Models\HabitacionModel;
use State\StatusCode;

/**
 * Class HabitacionController
 * @author Felicidad Hilari
 */
class HabitacionController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->model = new HabitacionModel();
  }

  public function getAll(Request $request, Response $response): Response
  {
    $this->view->setBasePath($request->getBasePath());
    $habitaciones = $this->model->getAll();
    if (!count($habitaciones))
      throw new NotFoundException('No existen habitaciones', StatusCode::NOT_FOUND);

    $this->render('Habitacion/index', ["habitaciones" => $habitaciones]);
    return $response->withStatusCode(StatusCode::OK);
  }
}
