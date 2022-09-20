<!DOCTYPE html>
<html lang="es">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="root">
    <?php require VIEWS . 'Templates/Header.php'; ?>

    <table border="1" cellspacing=0 cellpadding="10px">
      <caption>Habitaciones</caption>
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nro. Habitacion</th>
          <th>Nro. Piso</th>
          <th>Tipo de habitacion</th>
          <th>Descripcion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->get('habitaciones') as $habitacion) : ?>
          <tr>
            <td><?= $habitacion->getId() ?></td>
            <td> <?= $habitacion->getNumero() ?></td>
            <td> <?= $habitacion->getPiso() ?></td>
            <td> <?= $habitacion->getTipoHabitacion() ?></td>
            <td> <?= $habitacion->getDescripcion() ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <?php require VIEWS . 'Templates/Footer.php'; ?>
  </div>
</body>

</html>
