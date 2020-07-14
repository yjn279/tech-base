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
    <main>
      <div id="main_column">
        <? foreach ($plans as $plan): ?>
          <a class="plan" href="">
            <?= $plan ?>
          </a>
        <? endforeach ?>
      </div>
      <div id="side_column">
        <? if(0/* user == NULL */): ?>
          <p class="button">Login</p>
          <p class="button">Signup</p>
        <? endif ?>
        <? if(1/* user != NULL */): ?>
          <div id="side_calendar">Calendar</div>
          <p class="button">Make new plan!</p>
          <!-- Lists 実装予定 -->
        <? endif ?> <!-- セミコロン必要かも？ -->
      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>