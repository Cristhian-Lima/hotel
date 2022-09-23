<!DOCTYPE html>
<html lang="en">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
  <link rel="stylesheet" href=" <?= SERVER_HOST . $this->getBasePath() . '/styles/forms.css' ?>">
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . 'Templates/Header.php'; ?>
    <?php $cliente = $this->get('cliente') ?>

    <div class="container">
      <div class="form">
        <form action="<?= SERVER_HOST . $this->getBasePath() . '/perfil/edit' ?>" method="post">
          <div class="row-title">
            <h2>Editar datos</h2>
          </div>
          <div class="row">
            <label for="carnet">Carnet</label>
            <input autocomplete="off" required type="text" name="carnet" id="carnet" value="<?= $cliente->getCarnet() ?>">
          </div>
          <div class="row">
            <label for="correo">Correo electronico</label>
            <input autocomplete="off" required type="email" name="correo" id="correo" value="<?= $cliente->getCorreo() ?>">
          </div>
          <div class="row">
            <label for="password">Nueva Contraseña</label>
            <div class="pass">
              <input required type="password" name="password" id="password">
              <span><i class="icono fas fa-eye"></i></span>
            </div>
          </div>
          <div class="row">
            <label for="nombres">Nombres</label>
            <input autocomplete="off" required type="text" name="nombres" id="nombres" value="<?= $cliente->getNombres() ?>">
          </div>
          <div class="row">
            <label for="paterno">Apellido paterno</label>
            <input autocomplete="off" required type="text" name="paterno" id="paterno" value="<?= $cliente->getPaterno() ?>">
          </div>
          <div class="row">
            <label for="materno">Apellido materno</label>
            <input autocomplete="off" required type="text" name="materno" id="materno" value="<?= $cliente->getMaterno() ?>">
          </div>
          <div class="row">
            <label for="telefono">Nro. Telefono</label>
            <input autocomplete="off" required type="text" name="telefono" id="telefono" value="<?= $cliente->getTelefono() ?>">
          </div>
          <div class="row">
            <label for="nacionalidad">Nacionalidad</label>
            <input autocomplete="off" required type="text" name="nacionalidad" id="nacionalidad" value="<?= $cliente->getNacionalidad() ?>">
          </div>
          <div class="row">
            <input class="btn" type="submit" value="Guardar">
          </div>
        </form>
      </div>
    </div>

    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>
  <script src="<?= SERVER_HOST . $this->getBasePath() . '/js/showPassword.js' ?>"></script>
</body>

</html>
