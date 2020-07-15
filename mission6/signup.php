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
      <form action="timeline.php" method="POST">
        <input type="text" name="name" placeholder="name" required>
        <input type="email" name="eamil" placeholder="e-mail" required>
        <input type="password" name="password" placeholder="password" required>
        <input class="button" type="submit" name="signups" value="Signup">
      </form>
      <a class="button" href="login.php">Login</a>
    </main>
    <footer>
    </footer>
  </body>
</html>