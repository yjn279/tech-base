<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
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
      // header('Content-type:image/*');


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


    ?>

    <main>
      <a class="btn btn-default btn-lg btn-block" href="timeline.php">Timeline</a>
      <img class="rounded mx-auto d-block" src="backend/image.php?id=<?= $id ?>" alt="image">
      <div id="details">
        <h2><?= $title ?></h2>
        <pre><?= $schedule ?></pre>
        <pre><?= $comment ?></pre>
        <p><?= $date ?></p>
        <p><?= $name ?></p>


        <?php if(empty($_SESSION['user'])): ?>
          <a class="btn btn-primary btn-lg btn-block" href="login.php">Login</a>
          <a class="btn btn-default btn-lg btn-block" href="signup.php">Signup</a>
        <?php else: ?>
          <!-- <a class="btn btn-primary btn-lg btn-block" href="">Add to calendar</a> -->
          <a class="btn btn-primary btn-lg btn-block" href="edit.php?id=<?= $id ?>">Edit</a>

          <?php if($_SESSION['user'] == $name_id): ?>
            <a class="btn btn-default btn-lg btn-block" href="backend/delete.php?id=<?= $id ?>">Delete</a>
          <?php endif ?>

          <!-- <p class="btn btn-primary btn-lg btn-block">Add to lists</p> -->
        <?php endif ?>


      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>