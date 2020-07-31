<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Edit</title>
  </head>
  <body>
    <header>
    </header>

    <?php


      //インクルード
      
      include 'libraries/main.php';
      $users = new Users();
      $plans = new Plans();


      // リダイレクト
      redirect('timeline.php', empty($_SESSION['user'] || $_GET['id']));


      $user = $_SESSION['user'];
      $id = $_GET['id'];
      $plan = $plans -> get_plan($id);
      $title = $plan['title'];
      $schedule = $plan['schedule'];
      $comment = $plan['comment'];
      $image = $plan['image'];
      $date = $plan['created_at'];
      $name_id = $plan['users_id'];
      $name = $users -> get_user($name_id);
      $file = $_SESSION['user'] == $name_id ? 'edit' : 'make_plan';

      if ($user == $name_id) $file = "backend/edit.php?id=$id";
      else $file = "backend/make_plan.php?id=$id&original=FALSE";


    ?>

    <main class="container-fluid">
      <div class="row">
        <img class="col-6" src="backend/image.php?id=<?= $id ?>" alt="image">
        <form class="col-6" action="<?= $file ?>" method="POST" enctype="multipart/form-data">

        <?php if(!empty($_GET['error'])): ?>
          <p class="alert alert-danger">画像は10MBまでアップロードできます。</p>
        <?php endif ?>

          <h4>Title</h4>
          <input class="form-control" type="text" name="title" placeholder="Title" value="<?= $title ?>" required>
          <h4>Schedule</h4>
          <textarea class="form-control" name="schedule" cols="30" rows="10" placeholder="Schedule" required><?= $schedule ?></textarea>
            <div>
              <h4>Comment</h4>
              <textarea class="form-control" name="comment" cols="30" rows="10" placeholder="Comment"><?= $comment ?></textarea>
              <div>
              <h4>Input a image</h4>
              <input class="form-control-file" type="file" name="img_del" accept="image/*">  <!-- valueどうする？ -->
              <input class="form-check-input" type="checkbox" name="img_del" value="TRUE">画像を削除
              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Edit">
            </div>
          </div>
        </form>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>