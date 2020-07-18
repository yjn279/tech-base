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
      <form action="timeline.php" method="POST">
        <input type="email" name="mail" placeholder="e-mail" required>
        <input type="password" name="password" placeholder="password" required>
        <input class="button" type="submit" name="login" value="Login">
      </form>
      
      <?php

        session_start();

        if(isset($_GET['error'])) {
          echo "<p>{$_GET['error']}</p>";
          // unset($_GET['error']);
        }
         
      ?>

      <a class="button" href="signup.php">Signup</a>
    </main>
    <footer>
    </footer>
  </body>
</html>