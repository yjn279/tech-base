<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Edit</title>
  </head>
  <body class="bg-light">
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

    <main class="card bg-light border-0 p-3">
      <div class="row no-gutters">

        <?php if(!empty($image)): ?>
          <img class="card-img-top col-lg-6" src="backend/image.php?id=<?= $id ?>" alt="image">
        <?php endif ?>

        <form class="col-lg-6" action="<?= $file ?>" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <h1 class="text-md-center">Edit</h1>
            <h4>Title</h4>
            <input class="form-control mb-3" type="text" name="title" placeholder="Title" value="<?= $title ?>" required>
            <h4>Schedule</h4>
            <textarea class="form-control mb-3" name="schedule" cols="30" rows="10" placeholder="Schedule" required><?= $schedule ?></textarea>
            <h4>Comment</h4>
            <textarea class="form-control mb-3" name="comment" cols="30" rows="10" placeholder="Comment"><?= $comment ?></textarea>
            <h4 class="mb-2">Input a image</h4>
            <input class="form-control-file mb-2" type="file" name="image" accept="image/*">  <!-- valueどうする？ -->
            <input class="mb-2 mr-2" type="checkbox" name="img_del" value="TRUE">画像を削除
            <p class="alert alert-warning mb-3">画像は3MBまでアップロードできます。</p>
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Edit">
          </div>
        </form>
      </div>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>