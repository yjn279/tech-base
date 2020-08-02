<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Signup</title>
  </head>
  <body class="bg-light">
    <header>
    </header>
    <main class="col-lg-4 mx-auto p-5">
      <h1 class="text-info text-center mb-3">Signup</h1>

      <?php include 'libraries/main.php' ?>
      <?php redirect('timeline.php', !empty($_SESSION['user'])) ?>

      <?php if(!empty($_GET['error'])): ?>
        <p>あいうえお</p>
        <?php if($_GET['error'] == 1): ?>
          <p class="alert alert-danger">確認用のメールアドレスが一致しません。</p>
        <?php elseif($_GET['error'] == 2): ?>
          <p class="alert alert-danger">確認用のパスワードが一致しません。</p>
        <?php else: ?>
          <p class="alert alert-danger">このメールアドレスは既に登録されています。</p>
        <?php endif ?>
      <?php endif ?>

      <form action="backend/signup.php" method="POST">
        <h4>Name</h4>
        <input class="form-control mb-3" type="text" name="name" placeholder="name" required>
        <h4>Email adress</h4>
        <input class="form-control mb-2" type="email" name="email_1" placeholder="e-mail" required>
        <input class="form-control mb-3" type="email" name="email_2" placeholder="e-mail (confirmation)" required>
        <h4>Password</h4>
        <input class="form-control mb-2" type="password" name="password_1" placeholder="password" required>
        <input class="form-control mb-3" type="password" name="password_2" placeholder="password" required>
        <input class="btn btn-info btn-lg btn-block mb-2" type="submit" value="Signup">
      </form>
      <a class="btn btn-lg btn-block border-info text-info border mb-4" href="login.php">Login</a>
      <a class="btn btn-lg btn-block border-info text-info" href="timeline.php">Timeline</a>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>