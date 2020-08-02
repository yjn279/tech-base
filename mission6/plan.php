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

    <main class="card bg-light border-0 p-3">
      <div class="row no-gutters">

        <?php if(!empty($image)): ?>
          <img class="card-img-top col-md-6" src="backend/image.php?id=<?= $id ?>" alt="image">
        <?php endif ?>

        <div class="col-md-6 mx-md-auto">
          <div class="card-body">
            <h2 class="card-title"><?= $title ?>への旅行</h2>
            <p class="card-text"><?= $schedule ?></p>
            <p class="card-text"><?= $comment ?></p>
            <small class="card-text"><?= $date ?> by <?= $name ?></small>


            <?php if(empty($_SESSION['user'])): ?>
              <a class="btn btn-info btn-lg btn-block" href="login.php">Login</a>
              <a class="btn btn-lg btn-block border-info text-info" href="signup.php">Signup</a>
            <?php else: ?>
              <!-- <a class="btn btn-info btn-lg btn-block" href="">Add to calendar</a> -->
              <a class="btn btn-info btn-lg btn-block" href="edit.php?id=<?= $id ?>">Edit</a>

              <?php if($_SESSION['user'] == $name_id): ?>
                <!-- <a class="btn btn-lg btn-block border-info text-info" href="backend/delete.php?id=<?= $id ?>">Delete</a> -->
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-lg btn-block border-info text-info" data-toggle="modal" data-target="#exampleModal">
                  Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel">本当に削除しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        一度削除したプランは復元できません。
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-danger" href="backend/delete.php?id=<?= $id ?>">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endif ?>
              <!-- <p class="btn btn-info btn-lg btn-block">Add to lists</p> -->
            <?php endif ?>


            <a class="btn btn-lg btn-block border-info text-info mt-4" href="timeline.php">Timeline</a>
          </div>
        </div>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>