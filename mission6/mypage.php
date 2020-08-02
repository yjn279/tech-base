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

      $user = $_SESSION['user'];
      
    ?>

    <main class="py-3">
    <h1 class="text-info text-md-center mb-3">Mypage</h1>
    <div class="list-group list-group-flush col-md-10 mx-md-auto">


      <?php $plans = $plans_inst -> get_by_user($user) ?>


      <?php foreach ($plans as $plan): ?>
        <a class="list-group-item list-group-item-action row d-flex bg-light" href="plan.php?id=<?= $plan['plans_id'] ?>">

        <?php if(!empty($plan['image'])): ?>
          <img class="col-md-6" src="backend/image.php?id=<?= $plan['plans_id'] ?>" alt="image">
        <?php endif ?>

          <div class="col-md-6">
            <h2><?= $plan['title'] ?>への旅行</h2>
            <p class="text-secondary"><?= $plan['schedule'] ?></p>
            <small><?= $plan['created_at'] ?></small>
          </div>
        </a>
      <?php endforeach ?>


    </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>