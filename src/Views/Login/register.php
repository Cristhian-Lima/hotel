<!DOCTYPE html>
<html lang="en">

<head>
  <?php require VIEWS . 'Templates/Head.php' ?>
  <link rel="stylesheet" href=" <?= SERVER_HOST . $this->getBasePath() . '/styles/forms.css' ?>">
</head>

<body>

  <div class="container" style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
    <div class="form">
      <div class="row">
        <h2 class="title">Crear cuenta</h2>
      </div>
      <form action=" <?= $this->getBasePath() . '/register' ?>" method="post">
        <div class="row">
          <label for="carnet">Carnet</label>
          <input autocomplete="off" required type="text" name="carnet" id="carnet">
        </div>
        <div class="row">
          <label for="correo">Correo electronico</label>
          <input autocomplete="off" required type="email" name="correo" id="correo">
        </div>
        <div class="row">
          <label for="password">Contraseña</label>
          <div class="pass">
            <input required type="password" name="password" id="password">
            <span><i class="icono fas fa-eye"></i></span>
          </div>
        </div>
        <div class="row">
          <label for="nombres">Nombres</label>
          <input autocomplete="off" required type="text" name="nombres" id="nombres">
        </div>
        <div class="row">
          <label for="paterno">Apellido paterno</label>
          <input autocomplete="off" required type="text" name="paterno" id="paterno">
        </div>
        <div class="row">
          <label for="materno">Apellido materno</label>
          <input autocomplete="off" required type="text" name="materno" id="materno">
        </div>
        <div class="row">
          <label for="telefono">Nro. Telefono</label>
          <input autocomplete="off" required type="text" name="telefono" id="telefono">
        </div>
        <div class="row">
          <label for="nacionalidad">Nacionalidad</label>
          <input autocomplete="off" required type="text" name="nacionalidad" id="nacionalidad">
        </div>
        <div class="row">
          <input class="btn" type="submit" value="Registrarse">
        </div>
        <div class="row">
          <div class="links">
            <span>¿Ya tienes cuenta? <a href="<?= SERVER_HOST . $this->getBasePath() . '/login' ?>" class="link">Iniciar sesion</a></span>
            <a href="<?= SERVER_HOST . $this->getBasePath() ?>" class="link">Inicio</a>
          </div>
        </div>

      </form>
    </div>
  </div>

  <script src="<?= SERVER_HOST . $this->getBasePath() . '/js/showPassword.js' ?>"></script>
</body>

</html>
