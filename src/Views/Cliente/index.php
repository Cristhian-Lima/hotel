<!DOCTYPE html>
<html lang="en">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
</head>

<body>
  <?php require VIEWS . 'Templates/Header.php'; ?>

  <table border="1" cellspacing=0 cellpadding="10px">
    <caption><b>LISTA DE CLIENTES</b></caption>
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nro. Carnet</th>
        <th>Correo</th>
        <th>Nombres</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Telefono</th>
        <th>Nacionalidad</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($this->get('clientes') as $cliente) : ?>
        <tr>
          <td> <?= $cliente->getId() ?></td>
          <td> <?= $cliente->getCarnet() ?></td>
          <td> <?= $cliente->getCorreo() ?></td>
          <td> <?= $cliente->getNombres() ?></td>
          <td> <?= $cliente->getPaterno() ?></td>
          <td> <?= $cliente->getMaterno() ?></td>
          <td> <?= $cliente->getTelefono() ?></td>
          <td> <?= $cliente->getNacionalidad() ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <?php require VIEWS . 'Templates/Footer.php'; ?>
</body>

</html>
