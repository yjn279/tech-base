<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'assets/stylesheets.php' ?>
    <title>Make a New Plan!</title>
  </head>
  <body class="bg-light">
    <header>
    </header>

    <?php include 'libraries/main.php' ?>
    <?php redirect('login.php', empty($_SESSION['user'])) ?>

    <main class="col-md-6 mx-auto py-5">
      <h1 class="text-info text-md-center">Make your new Plan!</h1>
      <form class="bg-light" action="backend/make_plan.php?original=TRUE" method="POST" enctype="multipart/form-data">
        <h4>Title</h4>
        <input class="form-control mb-3" type="text" name="title" placeholder="title" required>
        <h4>Schedule</h4>
        <textarea class="form-control mb-3" name="schedule" cols="30" rows="10" placeholder="schedule" required></textarea>
        <h4>Comment</h4>
        <textarea class="form-control mb-3" name="comment" cols="30" rows="10" placeholder="comment"></textarea>
        <h4 class="mb-2">Input a image</h4>
        <input class="form-control-file mb-2" type="file" name="image" accept="image/*">
        <p class="alert alert-warning mb-3">画像は3MBまでアップロードできます。</p>
        <input class="btn btn-info btn-lg btn-block" type="submit" value="Make!">
      </form>
    </main>
    <footer>
    </footer>
    <?php include 'assets/scripts.php' ?>
  </body>
</html>