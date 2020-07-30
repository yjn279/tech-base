<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  </head>
  <body>
    <header>
    </header>
    <main>
      <form action="backend/login.php" method="POST">
        <input type="email" name="email" placeholder="e-mail" required>
        <input type="password" name="password" placeholder="password" required>
        <input class="button" type="submit" value="Login">
      </form>
      
      <?php

        include 'libraries/main.php';
        redirect('timeline.php', !empty($_SESSION['user']));
        message();  // エラー処理
        
      ?>

      <a class="button" href="signup.php">Signup</a>
    </main>
    <footer>
    </footer>
  </body>
</html>