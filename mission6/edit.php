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
      $from = from();


      // リダイレクト
      // redirect(empty($_SESSION['user']));


      // edit

      $id = $_GET['id'];
      $plan = $plans -> get_plans('plans_id', $id);
      $title = $plan[0]['title'];
      $schedule = $plan[0]['schedule'];
      $comment = $plan[0]['comment'];
      $image = $plan[0]['image'];
      $date = $plan[0]['created_at'];
      $name_id = $plan[0]['users_id'];
      $name = $users -> get_user($name_id);
      $original = $_SESSION['user'] == $name_id ? TRUE : FALSE;


    ?>

    <main>
      <form action="plan.php?from=edit&id=<?= $id ?>&original=<?= $original ?>" method="POST">
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