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

    <?php
    
      // 
    
    ?>

    <main>
      <img src="" alt="">
      <div id="details">
        <pre>Shedule</pre>
        <pre>Comment</pre>
        <?php if(empty($_SESSION['user'])): ?>
          <p class="button">Login</p>
          <p class="button">Signup</p>
        <?php else: ?>
          <p class="button">Add to calenddar</p>
          <!-- <p class="button">Add to lists</p> -->
        <?php endif ?>

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>