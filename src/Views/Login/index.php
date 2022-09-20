<!DOCTYPE html>
<html lang="es">

<head>
  <?php require VIEWS . 'Templates/Head.php'; ?>
  <link rel="stylesheet" href=" <?= SERVER_HOST . $this->getBasePath() . '/styles/forms.css' ?>">
</head>

<body style="background: url(<?= SERVER_HOST . $this->getBasePath() . '/img/bg-login.jpg' ?>)">
  <div class="container">
    <div class="form">
      <div class="row-title">
        <h2 class="title">Log In</h2>
      </div>
      <form id="form-login" action="<?= SERVER_HOST . $this->getBasePath() . '/login' ?>" method="post">
        <?php if ($this->has('message')) : ?>
          <div class=" danger">
            <p> <?= $this->get('message') ?></p>
          </div>
        <?php endif ?>
        <div class="row">
          <label for="email">Email</label>
          <input autocomplete="off" required type="email" name="email" placeholder="Email">
        </div>
        <div class="row">
          <label for="password">Password</label>
          <div class="pass">
            <input class="password" required type="password" name="password" placeholder="Password">
            <span><i class="icono fas fa-eye"></i></span>
          </div>
        </div>
        <div class="row">
          <input class="btn" type="submit" value="Login">
        </div>
        <div class="row">
          <div class="links">
            <span>¿Nuevo? <a class="link" href=" <?= SERVER_HOST . $this->getBasePath() . '/register' ?>">Registrate</a></span>
            <a href="<?= SERVER_HOST . $this->getBasePath() ?>" class="link">Inicio</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src=" <?= SERVER_HOST . $this->getBasePath() . '/js/showPassword.js' ?>"></script>
</body>

</html>
