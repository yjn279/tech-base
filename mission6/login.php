<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Login</title>
  </head>
  <body class="bg-light">
    <header>
    </header>
    <main class="col-4 mx-auto p-5">
      <h1 class="text-center mb-3">Login</h1>

      <?php include 'libraries/main.php' ?>
      <?php redirect('timeline.php', !empty($_SESSION['user'])) ?>

      <?php if(!empty($_GET['error'])): ?>
        <p class="alert alert-danger">メールアドレスまたはパスワードが正しくありません。</p>
      <?php endif ?>

      <form action="backend/login.php" method="POST">
        <h4>Email adress</h4>
        <input class="form-control mb-3" type="email" name="email" placeholder="e-mail" required>
        <h4>Password</h4>
        <input class="form-control mb-3" type="password" name="password" placeholder="password" required>
        <input class="btn btn-primary btn-lg btn-block mb-2" type="submit" value="Login">
      </form>
      <a class="btn btn-lg btn-block border-primary text-primary border mb-3" href="signup.php">Signup</a>
      <a class="btn btn-lg btn-block border-primary text-primary shadow-sm" href="timeline.php">Timeline</a>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>