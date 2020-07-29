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
    

      // インクルード

      include 'libraries/main.php';
      $users = new Users();
      $plans = new Plans();


      // リダイレクト
      redirect('timeline.php', empty($_GET['id']));


      // データの取得

      $id = $_GET['id'];
      $plan = $plans -> get_plan($id);
      $title = $plan['title'];
      $schedule = $plan['schedule'];
      $comment = $plan['comment'];
      $image = $plan['image'];
      $date = $plan['created_at'];
      $name_id = $plan['users_id'];
      $name = $users -> get_user($name_id);

      $user = $_SESSION['user'];


    ?>

    <main>
      <img src="" alt="">
      <div id="details">
        <h3><?= $title ?></h3>
        <pre><?= $schedule ?></pre>
        <pre><?= $comment ?></pre>
        <p><?= $date ?></p>
        <p><?= $name ?></p>


        <?php if(empty($user)): ?>
          <a class="button" href="login.php">Login</a>
          <a class="button" href="signup.php">Signup</a>
        <?php else: ?>
          <a class="button" href="">Add to calendar</a>
          <a class="button" href="edit.php?id=<?= $id ?>">Edit</a>

          <?php if($user == $name_id): ?>
            <a class="button" href="backend/delete.php?id=<?= $id ?>">Delete</a>
          <?php endif ?>

          <!-- <p class="button">Add to lists</p> -->
        <?php endif ?>


      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>