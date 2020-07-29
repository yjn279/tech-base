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

      $user = $_SESSION['user'];
      $name = $_SESSION['name'];


      // from timeline
      
      if($_GET['from'] == 'timeline' && !empty($_GET['id'])) {

        $id = $_GET['id'];
        $plan = $plans -> get_plans('plans_id', $id);
        $title = $plan[0]['title'];
        $schedule = $plan[0]['schedule'];
        $comment = $plan[0]['comment'];
        $image = $plan[0]['image'];
        $date = $plan[0]['created_at'];
        $name_id = $plan[0]['users_id'];
        $name = $users -> get_user($name_id);

      }
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

          <?php if($name_id == $user): ?>
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