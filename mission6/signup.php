<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Signup</title>
  </head>
  <body>
    <header>
    </header>
    <main>
      <h1>Signup</h1>
      <form action="backend/signup.php?from=signup" method="POST">
        <h4 for="signup-name">Name</h4>
        <input class="form-control" id="signup-name" type="text" name="name" placeholder="name" required>
        <h4>Email adress</h4>
        <input class="form-control" type="email" name="email" placeholder="e-mail" required>
        <h4>Password</h4>
        <input class="form-control" type="password" name="password" placeholder="password" required>
        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Signup">
      </form>

      <?php
        
        include 'libraries/main.php';
        redirect('timeline.php', !empty($_SESSION['user']));
        message();  // エラー処理
        
      ?>

      <a class="btn btn-default btn-lg btn-block" href="login.php">Login</a>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>