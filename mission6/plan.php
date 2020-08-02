<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Plan</title>
  </head>
  <body class="bg-light">
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

    <main class="card border-0 p-3">
      <div class="row no-gutters">

        <?php if(!empty($image)): ?>
          <img class="card-img-top col-lg-6" src="backend/image.php?id=<?= $id ?>" alt="image">
        <?php endif ?>

        <div class="col-lg-6">
          <div class="card-body">
            <h2 class="card-title"><?= $title ?></h2>
            <p class="card-text"><?= $schedule ?></p>
            <p class="card-text"><?= $comment ?></p>
            <p class="card-text"><?= $date ?></p>
            <p class="card-text"><?= $name ?></p>


            <?php if(empty($_SESSION['user'])): ?>
              <a class="btn btn-primary btn-lg btn-block shadow-sm" href="login.php">Login</a>
              <a class="btn btn-lg btn-block border-primary text-primary shadow-sm" href="signup.php">Signup</a>
              <a class="btn btn-lg btn-block border-primary text-primary shadow-sm" href="timeline.php">Timeline</a>
            <?php else: ?>
              <!-- <a class="btn btn-primary btn-lg btn-block" href="">Add to calendar</a> -->
              <a class="btn btn-primary btn-lg btn-block shadow-sm" href="edit.php?id=<?= $id ?>">Edit</a>

              <?php if($_SESSION['user'] == $name_id): ?>
                <a class="btn btn-lg btn-block border-primary text-primary shadow-sm" href="backend/delete.php?id=<?= $id ?>">Delete</a>
              <?php endif ?>
              <!-- <p class="btn btn-primary btn-lg btn-block">Add to lists</p> -->
              <a class="btn btn-lg btn-block border-primary text-primary shadow-sm" href="timeline.php">Timeline</a>
            <?php endif ?>


          </div>
        </div>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>