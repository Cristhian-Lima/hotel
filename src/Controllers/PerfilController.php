<?php

declare(strict_types=1);

namespace Controllers;

use Entities\Cliente;
use Exception\LoginException;
use Http\Request;
use Http\Response;
use Http\Session;
use Models\ClienteModel;
use State\StatusCode;
use Tools\HashTool;

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

  public function edit(Request $request, Response $response): Response
  {
    $cliente = $this->session->getCurrentClient();
    $this->view->setBasePath($request->getBasePath());
    $this->render('Cliente/edit', ["cliente" => $cliente]);
    return $response;
  }

  public function update(Request $request, Response $response): Response
  {
    $cliente = $this->session->getCurrentClient();
    $cliente->setCarnet($request->getParam('carnet'));
    $cliente->setCorreo($request->getParam('correo'));
    $cliente->setNombres($request->getParam('nombres'));
    $cliente->setPaterno($request->getParam('paterno'));
    $cliente->setMaterno($request->getParam('materno'));
    $cliente->setTelefono($request->getParam('telefono'));
    $cliente->setNacionalidad($request->getParam('nacionalidad'));

    /* Encriptamos el password */
    $passwordHashed = HashTool::hash($request->getParam('password'));
    $cliente->setPassword($passwordHashed);

    if (!$this->model->update($cliente))
      throw new LoginException('No se pudo actualizar el cliente', StatusCode::BAD_REQUEST);

    return $response
      ->withStatusCode(StatusCode::RESOURCE_CREATED)
      ->withHeader('Location', SERVER_HOST . $request->getBasePath() . '/login');
    return $response;
  }
}
