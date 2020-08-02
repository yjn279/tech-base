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

    <main class="container-fluid py-3">
      <div class="row">
        <div class="col-lg-2 mt-md-5 mb-5">
          <h1 class="text-info text-md-center mb-3">Timeline</h1>

          <?php if(empty($_SESSION['user'])): ?>
            <a class="btn btn-info btn-lg btn-block shadow-sm" href="login.php">Login</a>
            <a class="btn btn-lg btn-block border-info text-info shadow-sm" href="signup.php">Signup</a>
          <?php else: ?>
            <!-- <div id="side_calendar">Calendar</div> -->
            <!-- Lists 実装予定 -->
            <a class="btn btn-info btn-lg btn-block shadow-sm" href="make_plan.php">Make a New Plan!</a>
            <a class="btn btn-lg btn-block border-info text-info shadow-sm" href="backend/logout.php">Logout</a>
          <?php endif ?>

        </div>
        <div class="col-lg-10 card-columns">


          <?php $plans = $plans_inst -> get_plans() ?>

          <?php foreach ($plans as $plan): ?>
            <a class="card border-0 shadow-sm text-reset" href="plan.php?id=<?= $plan['plans_id'] ?>">

            <?php if(!empty($plan['image'])): ?>
              <img class="card-img-top" src="backend/image.php?id=<?= $plan['plans_id'] ?>" alt="image">
            <?php endif ?>
              
              <div class="card-body">
                <h2 class="card-title text-body"><?= $plan['title'] ?></h2>
                <p class="card-text text-secondary"><?= $plan['schedule'] ?></p>
              </div>
            </a>
          <?php endforeach ?>


        </div>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>