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
              <th>Codigo</th>
              <th>Cod. Habitacion</th>
              <th>Cod. Cliente</th>
              <th>Fecha Inicio</th>
              <th>Fecha Final</th>
              <th>Fecha reserva</th>
            </tr>
          </thead>
          <tbody class="table-body">
            <?php foreach ($this->get('reservas') as $reserva) : ?>
              <tr>
                <td><?= $reserva->getId() ?></td>
                <td><?= $reserva->getCodHabitacion() ?></td>
                <td><?= $reserva->getCodCliente() ?></td>
                <td><?= $reserva->getFechaInicio() ?></td>
                <td><?= $reserva->getFechaFinal() ?></td>
                <td><?= $reserva->getFecha() ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>

</body>

</html>
