<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <form id="form-login" action="<?= $this->get('basepath') . '/login' ?>" method="post">
      <div class="message-container">
      </div>
      <div class="email">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email">
      </div>
      <div class="password">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password">
      </div>

      <input type="submit" value="Login">
    </form>
  </div>
</body>

</html>
