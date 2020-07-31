<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Timeline</title>
  </head>
  <body>
    <header>
    </header>

    <?php

      include 'libraries/main.php';
      $plans_inst = new Plans();

    ?>

    <main class="container-fluid">
      <div class="row">
        <div class="col-9 list-group list-group-flush">


        <?php $plans = $plans_inst -> get_plans() ?>

          <?php foreach ($plans as $plan): ?>
          <a class="list-group-item list-group-item-action d-flex justify-content-around" href="plan.php?id=<?= $plan['plans_id'] ?>">
            <img class="" src="backend/image.php?id=<?= $plan['plans_id'] ?>" alt="image">
            <div class="">
              <h2><?= $plan['title'] ?></h2>
              <pre><?= $plan['schedule'] ?></pre>
              <pre><?= $plan['comment'] ?></pre>
            </div>
          </a>
        <?php endforeach ?>


        </div>
        <div class="col-3">

        <?php if(empty($_SESSION['user'])): ?>
          <a class="btn btn-primary btn-lg btn-block" href="login.php">Login</a>
          <a class="btn btn-default btn-lg btn-block" href="signup.php">Signup</a>
        <?php else: ?>
          <!-- <div id="side_calendar">Calendar</div> -->
          <!-- Lists 実装予定 -->
          <a class="btn btn-primary btn-lg btn-block" href="make_plan.php">Make a New Plan!</a>
          <a class="btn btn-default btn-lg btn-block" href="backend/logout.php">Logout</a>
        <?php endif ?>

        </div>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>