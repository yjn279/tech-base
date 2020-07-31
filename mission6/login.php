<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Login</title>
  </head>
  <body>
    <header>
    </header>
    <main class="col-4">
      <h1>Login</h1>

      <?php if(!empty($_GET['error'])): ?>
        <p class="alert alert-danger">メールアドレスまたはパスワードが正しくありません。</p>
      <?php endif ?>

      <form action="backend/login.php" method="POST">
        <h4>Email adress</h4>
        <input class="form-control" type="email" name="email" placeholder="e-mail" required>
        <h4>Password</h4>
        <input class="form-control" type="password" name="password" placeholder="password" required>
        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
      </form>
      
      <?php include 'libraries/main.php' ?>
      <?php redirect('timeline.php', !empty($_SESSION['user'])) ?>

      <a class="btn btn-defalut btn-lg btn-block border" href="signup.php">Signup</a>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>