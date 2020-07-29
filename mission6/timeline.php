<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
  </head>
  <body>
    <header>
    </header>

    <?php

      include 'libraries/main.php';
      $plans_inst = new Plans();

    ?>

    <main>
      <div id="main_column">


        <?php $plans = $plans_inst -> get_plans() ?>

         <?php foreach ($plans as $plan): ?>
          <a id="plan" href="plan.php?from=timeline&id=<?= $plan['plans_id'] ?>">
            <img src="" alt="">
            <div>
              <h3><?= $plan['title'] ?></h3>
              <pre><?= $plan['schedule'] ?></pre>
            </div>
          </a>
        <?php endforeach ?>


      </div>
      <div id="side_column">

        <?php if(empty($_SESSION['user'])): ?>
          <a class="button" href="login.php">Login</a>
          <a class="button" href="signup.php">Signup</a>
        <?php else: ?>
          <div id="side_calendar">Calendar</div>
          <a class="button" href="make_plan.php">Make new plan!</a>
          <!-- Lists 実装予定 -->
        <?php endif ?>

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>