<!DOCTYPE html>
<html lang="en">

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
          <h2>¿Esta seguro de eliminar la reservacion?</h2>
        </div>
        <form method="POST" action="<?= SERVER_HOST . $this->getBasePath() . '/reservas/eliminar/' . $this->get('id') ?>">
          <div class="row">
            <a href="<?= SERVER_HOST . $this->getBasePath() . '/reservas' ?>" class="btn btn-succes">Cancelar</a>
            <input class="btn btn-danger" type="submit" value="Eliminar">
          </div>
        </form>
      </div>
    </div>
    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>
</body>

</html>
