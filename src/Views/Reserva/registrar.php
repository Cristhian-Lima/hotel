<!DOCTYPE html>
<html lang="es">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
  <link rel="stylesheet" href=" <?= SERVER_HOST . $this->getBasePath() . '/styles/forms.css' ?>">
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . 'Templates/Header.php'; ?>
    <div class="container">
      <div class="form">
        <div class="row-title">
          <h2>Reservacion</h2>
        </div>
        <form action=" <?= SERVER_HOST . $this->getBasePath() . '/reservas/registrar' ?>" method="post">
          <div class="row">
            <label for="inicio">Fecha para la reserva</label>
            <input name="inicio" type="date">
          </div>
          <div class="row">
            <label for="num_dias">Dias de estadia</label>
            <input name="num_dias" type="number">
            <input type="hidden" name="cod_habitacion" value="<?= $this->get('cod_habitacion') ?>">
          </div>
          <div class="row">
            <input class="btn" type="submit" value="Registrar">
          </div>
        </form>
      </div>
    </div>
    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>
</body>

</html>
