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

      session_start();

      if (isset($_POST['signup'])) {
        // dbに登録
        $name = $_POST['name'];
      } elseif (isset($_POST['login'])) {
        $name = $_POST['email'];  // email -> name
      }

    ?>

    <main>
      <div id="main_column">
        <?php foreach ($plans as $plan): ?>
          <a class="plan" href="">
            <?= $plan ?>
          </a>
        <?php endforeach; ?>
      </div>
      <div id="side_column">
        <?php if(0/* user == NULL */): ?>
          <a class="button" href="">Login</a>
          <a class="button" href="">Signup</a>
        <?php endif ?>
        <?php if(1/* user != NULL */): ?>
          <div id="side_calendar">Calendar</div>
          <a class="button" href="">Make new plan!</a>
          <!-- Lists 実装予定 -->
        <?php endif; ?> <!-- セミコロン必要？ -->
      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>