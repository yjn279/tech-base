<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
  </head>
  <body>
    <header>
    </header>
    <main>
      <form action="timeline.php?from=signup" method="POST">
        <input type="text" name="name" placeholder="name" required>
        <input type="email" name="email" placeholder="e-mail" required>
        <input type="password" name="password" placeholder="password" required>
        <input class="button" type="submit" value="Signup">
      </form>

      <?php
        
        include 'libraries/main.php';
        redirect('timeline.php', !empty($_SESSION['user']));
        echo_error();  // エラー処理
        
      ?>

      <a class="button" href="login.php">Login</a>
    </main>
    <footer>
    </footer>
  </body>
</html>