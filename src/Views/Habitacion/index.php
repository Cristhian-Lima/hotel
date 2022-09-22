<!DOCTYPE html>
<html lang="es">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . 'Templates/Header.php'; ?>

    <div class="container">
      <div class="box">
        <div class="row-title">
          <h2>Habitaciones</h2>
        </div>
        <table class="table">
          <thead class="table-head">
            <tr>
              <th>Codigo</th>
              <th>Nro. Habitacion</th>
              <th>Nro. Piso</th>
              <th>Tipo de habitacion</th>
              <th>Descripcion</th>
              <th>Disponibilidad</th>
            </tr>
          </thead>
          <tbody class="table-body">
            <?php foreach ($this->get('habitaciones') as $habitacion) : ?>
              <tr class="<?= strtolower($habitacion->getTipoDisponibilidad()) ?>">
                <td><?= $habitacion->getId() ?></td>
                <td> <?= $habitacion->getNumero() ?></td>
                <td> <?= $habitacion->getPiso() ?></td>
                <td> <?= $habitacion->getTipoHabitacion() ?></td>
                <td> <?= $habitacion->getDescripcion() ?></td>
                <td> <?= $habitacion->getTipoDisponibilidad() ?></td>
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
