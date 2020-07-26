<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make plan</title>
  </head>
  <body>
    <header>
    </header>

    <?php

      include 'libraries/main.php'  // インクルード
      redirect(empty($_SESSION['user']))  // リダイレクト
      from()  // ページ管理

    ?>

    <main>
      <form action="plan.php" method="POST">
        <input type="text" name="title" placeholder="タイトルを入力" required>
        <textarea name="schedule" cols="30" rows="10" placeholder="スケジュールを入力" required></textarea>
        <div>
          <textarea name="comment" cols="30" rows="10" placeholder="コメントを入力"></textarea>
          <div>
          <p>画像を入力してください。</p>
          <input type="file" name="image">
          <input class="button" type="submit" value="Add to calendar">
          </div>
        </div>
      </form>
    </main>
    <footer>
    </footer>
  </body>
</html>