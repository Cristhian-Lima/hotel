<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrate</title>
  <style>
    .row {
      width: 300px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
    }

    .row label {
      width: 50%;
    }

    .row input {
      width: 50%;
    }
  </style>
</head>

<body>

  <div class="container">
    <form action=" <?= $this->getBasePath() . '/register' ?>" method="post">
      <div class="row">
        <label for="carnet">Carnet</label><input required type="text" name="carnet" id="carnet">
      </div>
      <div class="row">
        <label for="correo">Correo electronico</label><input required type="email" name="correo" id="correo">
      </div>
      <div class="row">
        <label for="password">Contraseña</label><input required type="password" name="password" id="password">
      </div>
      <div class="row">
        <label for="nombres">Nombres</label><input required type="text" name="nombres" id="nombres">
      </div>
      <div class="row">
        <label for="paterno">Apellido paterno</label><input required type="text" name="paterno" id="paterno">
      </div>
      <div class="row">
        <label for="materno">Apellido materno</label><input required type="text" name="materno" id="materno">
      </div>
      <div class="row">
        <label for="telefono">Nro. Telefono</label><input required type="text" name="telefono" id="telefono">
      </div>
      <div class="row">
        <label for="nacionalidad">Nacionalidad</label><input required type="text" name="nacionalidad" id="nacionalidad">
      </div>
      <div class="row">
        <input type="submit" value="Registrarse">
      </div>

    </form>
  </div>

</body>

</html>
