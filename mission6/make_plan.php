<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Make a New Plan!</title>
  </head>
  <body>
    <header>
    </header>

    <?php include 'libraries/main.php' ?>
    <?php redirect('login.php', empty($_SESSION['user'])) ?>

    <main class="col-8">

      <?php if(!empty($_GET['error'])): ?>
        <p class="alert alert-danger">画像は10MBまでアップロードできます。</p>
      <?php endif ?>

      <form action="backend/make_plan.php?original=TRUE" method="POST" enctype="multipart/form-data">
        <h4>Title</h4>
        <input class="form-control" type="text" name="title" placeholder="title" required>
        <h4>Schedule</h4>
        <textarea class="form-control" name="schedule" cols="30" rows="10" placeholder="schedule" required></textarea>
        <div>
          <h4>Comment</h4>
          <textarea class="form-control" name="comment" cols="30" rows="10" placeholder="comment"></textarea>
          <div>
            <h4>Input a image</h4>
            <input class="form-control-file" type="file" name="image" accept="image/*">
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Make!">
          </div>
        </div>
      </form>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>