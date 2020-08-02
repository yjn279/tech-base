<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Mypage</title>
  </head>
  <body class="bg-light">
    <header>
    </header>

    <?php

      include 'libraries/main.php';
      $plans_inst = new Plans();

    ?>

    <main class="py-3">
    <div class="list-group list-group-flush col-md-8 mx-md-auto">
      <a class="list-group-item">Cras justo odio</a>
    </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>