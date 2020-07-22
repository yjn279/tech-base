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

      $pdo = connection_db();
      $user = $_SESSION['user'];
      $name = $_SESSION['name'];


      // from make_plan

      if (isset($_POST['make_plan'])) {

        
        // データの取得

        $title = escape($_POST['title']);
        $schedule = escape($_POST['schedule']);
        $comment = escape($_POST['comment']);
        $image = escape($_POST['image']);


        // プランをDBへ登録

        $stmt = $pdo -> prepare('INSERT INTO plans (title, schedule, comment, image, users_id, original) VALUES(:title, :schedule, :comment, :image, :user, 1)');
        $stmt -> bindParam(':title', $title, PDO::PARAM_STR);
        $stmt -> bindParam(':schedule', $schedule, PDO::PARAM_STR);
        $stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt -> bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt -> bindParam(':user', $user, PDO::PARAM_INT);
        // クラス化するとき、PDO::PARAM_BOOLがある
        $stmt -> execute();  // 実行が失敗した場合のエラー処理


        // プランデータを追加

        $id = (int) $pdo -> lastInsertId();

        $stmt = $pdo -> prepare('SELECT created_at FROM plans WHERE plans_id = :id');
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        $date = $stmt -> fetch();
        $date = $date['created_at'];


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