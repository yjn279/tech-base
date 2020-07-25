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


      // from make_plan

      if (isset($_POST['make_plan'])) {

        
        // データの取得

        $title = $_POST['title'];
        $schedule = $_POST['schedule'];
        $comment = $_POST['comment'];
        $image = NULL;  // $_POST['image'];


        // プランの登録・取得
        $id = $plans -> make_plan($user, $title, $schedule, $comment, $image);
        $plan = $plans -> get_plans('plans_id', $id, 'created_at');
        $date = $plan[0]['created_at'];


      }


      // form timeline

      elseif($_SESSION['from'] == 'timeline') {

        $id = $_GET['id'];
        $plan = $plans -> get_plans('plans_id', $id);
        $title = $plan[0]['title'];
        $schedule = $plan[0]['schedule'];
        $comment = $plan[0]['comment'];
        $date = $plan[0]['created_at'];
        $name = $plan[0]['users_id'];
        $name = $users -> get_user($name);

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
          <a class="button" href="">Add to calenddar</a>
          <!-- <p class="button">Add to lists</p> -->
        <?php endif ?>

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>