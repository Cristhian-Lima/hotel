<!DOCTYPE html>
<html lang="es">

<head>
  <?php require VIEWS . '/Templates/Head.php' ?>
  <link rel="stylesheet" href="<?= SERVER_HOST . $this->getBasePath() . '/styles/perfil.css' ?>">
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . '/Templates/Header.php' ?>
    <?php $cliente = $this->get('cliente') ?>
    <div class="container">
      <div class="box">
        <div class="row-title">
          <h2 class="title">Mi perfil</h2>
        </div>
        <div class="row">
          <span>Nombres</span><span><?= $cliente->getNombres() ?></span>
        </div>
        <div class="row">
          <span>Apellidos</span><span><?= $cliente->getPaterno() . ' ' . $cliente->getMaterno() ?></span>
        </div>
        <div class="row">
          <span>Correo Electronico</span><span><?= $cliente->getCorreo() ?></span>
        </div>
        <div class="row">
          <span>Telefono</span><span><?= $cliente->getTelefono() ?></span>
        </div>
        <div class="row">
          <span>Nacionalidad</span><span><?= $cliente->getNacionalidad() ?></span>
        </div>
        <div class="row-title">
          <span><a class="btn-succes" href="<?= SERVER_HOST . $this->getBasePath() . '/perfil/edit' ?>">Editar <i class="fas fa-edit"></i></a></span>
          <span><a class="btn-danger" href="<?= SERVER_HOST . $this->getBasePath() . '/logout' ?>">Cerrar sesion <i class="fas fa-right-from-bracket"></i></a></span>
        </div>
      </div>
    </div>
    <?php require VIEWS . '/Templates/Footer.php' ?>
  </div>
</body>

</html>
