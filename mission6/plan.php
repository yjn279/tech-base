<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan</title>
  </head>
  <body>
    <header>
    </header>
    <main>
      <img src="" alt="">
      <div id="details">
        <div>Shedule</div>
        <pre>Comment</pre>
        <?php if(0/* user == NULL */): ?>
          <p class="button">Login</p>
          <p class="button">Signup</p>
        <?php endif ?>
        <?php if(1/* user != NULL */): ?>
          <p class="button">Add to calenddar</p>
          <!-- <p class="button">Add to lists</p> -->
        <?php endif; ?> <!-- セミコロン必要？ -->

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>