<?php

declare(strict_types=1);

namespace Controllers;

use Entities\Cliente;
use Exception\LoginException;
use Http\Request;
use Http\Response;
use Http\Session;
use LogicException;
use Models\LoginModel;
use State\StatusCode;
use Tools\HashTool;

/**
 * Class LoginController
 * @author Felicidad Hilari
 */
class LoginController extends Controller
{
  /**
   * @var LoginModel
   */
  private $loginModel;

  /**
   * @var Session
   */
  private $session;


  public function __construct(Session $session)
  {
    parent::__construct();
    $this->loginModel = new LoginModel();
    $this->session = $session;
  }
  public function login(Request $request, Response $response): Response
  {
    $this->view->setBasePath($request->getBasePath());
    $this->render('Login/index');
    return $response->withStatusCode(StatusCode::OK);
  }

  public function logout(Request $request, Response $response): Response
  {
    $this->session->closeSession();
    return $response->withHeader('Location', SERVER_HOST . $request->getBasePath());
  }

  public function auth(Request $request, Response $response): Response
  {
    try {

      $email = $request->getParam('email');
      $password = $request->getParam('password');

      $cliente = $this->loginModel->login($email);

      if (!$cliente)
        throw new LogicException('Correo electronico incorrecto', StatusCode::BAD_REQUEST);

      if (!HashTool::verify($password, $cliente->getPassword()))
        throw new LogicException('Contraseña incorrecta', StatusCode::BAD_REQUEST);

      $this->session->setCurrentClient($cliente);
    } catch (\Exception $e) {
      $this->view->setBasePath($request->getBasePath());
      $this->render('Login/index', ["message" => $e->getMessage()]);
      return $response;
    }
    return $response->withHeader('Location', SERVER_HOST . $request->getBasePath());
  }

  public function register(Request $request, Response $response): Response
  {
    $this->view->setBasePath($request->getBasePath());
    $this->render('Login/register');
    return $response->withStatusCode(StatusCode::OK);
  }

  public function save(Request $request, Response $response): Response
  {
    $cliente = new Cliente();
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

    if (!$this->loginModel->save($cliente))
      throw new LoginException('No se pudo registrar el cliente', StatusCode::BAD_REQUEST);

    return $response
      ->withStatusCode(StatusCode::RESOURCE_CREATED)
      ->withHeader('Location', SERVER_HOST . $request->getBasePath() . '/login');
  }
}
