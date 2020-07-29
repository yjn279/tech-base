<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    ?>

    <main>
      <form action="backend/<?= $file ?>.php?id=<?= $id ?>" method="POST">
        <input type="text" name="title" placeholder="タイトルを入力" value="<?= $title ?>" required>
        <textarea name="schedule" cols="30" rows="10" placeholder="スケジュールを入力" required><?= $schedule ?></textarea>
          <div>
          <textarea name="comment" cols="30" rows="10" placeholder="コメントを入力"><?= $comment ?></textarea>
          <div>
          <p>画像を入力してください。</p>
          <input type="file" name="image">  <!-- valueどうする？ -->
          <input class="button" type="submit" value="Edit">
          </div>
        </div>
      </form>
    </main>
    <footer>
    </footer>
  </body>
</html>