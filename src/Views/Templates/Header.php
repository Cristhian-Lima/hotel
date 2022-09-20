<header>
  <nav class="bar">
    <div class="bar-container">
      <a class="link" href=" <?= SERVER_HOST . $this->getBasePath() ?>">Inicio</a>
      <a class="link" href=" <?= SERVER_HOST . $this->getBasePath() . '/habitaciones' ?>">Habitaciones</a>
    </div>
    <?php

    use Http\Session;

    $session = new Session();
    ?>
    <div class="bar-container profile">
      <?php if ($session->hasSession()) : ?>
        <?php $cliente = $session->getCurrentClient(); ?>
        <a class="link" href=" <?= SERVER_HOST . $this->getBasePath() . '/perfil' ?>"><?= $cliente->getNombres() . ' ' . $cliente->getPaterno() ?></a>
        <a class="link" href="<?= SERVER_HOST . $this->getBasePath() . '/logout' ?>">Cerrar sesion</a>
      <?php else : ?>
        <a class="link" class="link" href=" <?= SERVER_HOST . $this->getBasePath() . '/register' ?>">Registrate</a>
        <a class="link" class="link" href=" <?= SERVER_HOST . $this->getBasePath() . '/login' ?>">Log in</a>
      <?php endif ?>
    </div>
  </nav>
</header>
