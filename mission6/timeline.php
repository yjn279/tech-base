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
            <a class="list-group-item list-group-item-action row d-flex" href="plan.php?id=<?= $plan['plans_id'] ?>">

            <?php if(!empty($plan['image'])): ?>
              <img class="col-6 " src="backend/image.php?id=<?= $plan['plans_id'] ?>" alt="image">
            <?php else: ?>
              <p class="col-6">No image</p>
            <?php endif ?>
              
              <div class="col-6 p-0">
                <h2><?= $plan['title'] ?></h2>
                <pre><?= $plan['schedule'] ?></pre>
                <pre><?= $plan['comment'] ?></pre>
              </div>
            </a>
          <?php endforeach ?>


        </div>
        <div class="col-3 pt-5">

          <?php if(empty($_SESSION['user'])): ?>
            <a class="btn btn-primary btn-lg btn-block" href="login.php">Login</a>
            <a class="btn btn-default btn-lg btn-block border" href="signup.php">Signup</a>
          <?php else: ?>
            <!-- <div id="side_calendar">Calendar</div> -->
            <!-- Lists 実装予定 -->
            <a class="btn btn-primary btn-lg btn-block" href="make_plan.php">Make a New Plan!</a>
            <a class="btn btn-default btn-lg btn-block border" href="backend/logout.php">Logout</a>
          <?php endif ?>

        </div>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>