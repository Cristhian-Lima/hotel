<!DOCTYPE html>
<html lang="en">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . 'Templates/Header.php'; ?>

    <div class="container">
      <div class="box">
        <div class="row-title">
          <h2>Mis reservas</h2>
        </div>
        <table class="table">
          <thead class="table-head">
            <tr>
              <th>Nº Habitacion</th>
              <th>Piso</th>
              <th>Tipo</th>
              <th>Fecha Inicio</th>
              <th>Fecha Final</th>
              <th>Fecha reserva</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-body">
            <?php if (count($this->get('reservas')) > 0) : ?>
              <?php foreach ($this->get('reservas') as $reserva) : ?>
                <tr>
                  <td><?= $reserva->NUMERO ?></td>
                  <td><?= $reserva->PISO ?></td>
                  <td><?= $reserva->TIPO_HABITACION ?></td>
                  <td><?= $reserva->getFechaInicio() ?></td>
                  <td><?= $reserva->getFechaFinal() ?></td>
                  <td><?= $reserva->getFecha() ?></td>
                  <td><a href=" <?= SERVER_HOST . $this->getBasePath() . '/reservas/eliminar/' . $reserva->getId() ?>" class="btn-danger"><i class="fas fa-trash"></i></a></td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="6">Sin reservaciones</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>

</body>

</html>
