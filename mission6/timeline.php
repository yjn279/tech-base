<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
  </head>
  <body>
    <header>
    </header>


    <?php


      // DB接続

      $dsn = 'mysql:dbname=tb220145db;host=localhost';
      $user = 'tb-220145';
      $password = 'YXAzZ7AChH';

      $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


      // セッションの開始

      session_start();

      if (isset($_POST['signup'])) {


        // フォームデータの取得

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES|ENT_HTML5, 'UTF-8');
        $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES|ENT_HTML5, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES|ENT_HTML5, 'UTF-8');


        // アカウントをDBへ登録

        $stmt = $pdo -> prepare('INSERT INTO users (name, mail, password) VALUES(:name, :mail, :password)');
        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmt -> bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();  // 実行が失敗した場合のエラー処理
        // 既に登録されているアカウントに対するエラー処理


        // users_idの取得

        $stmt = $pdo -> prepare('SELECT * FROM users WHERE mail = :mail');
        $stmt -> bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch();


        // セッションの管理

        $_SESSION['user'] = $result[0];
        $_SESSION['name'] = $result[1];
        $_SESSION['mail'] = $result[2];
        $_SESSION['password'] = $result[3];

        // エラー処理


      }

      elseif (isset($_POST['login'])) {


        // フォームデータの取得

        $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES|ENT_HTML5, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES|ENT_HTML5, 'UTF-8');
        

        // users_idの取得

        $stmt = $pdo -> prepare('SELECT * FROM users WHERE mail=:mail AND password=:password');
        $stmt -> bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch();


        // セッションの管理

        if (isset($result[0])) {

          $_SESSION['user'] = $result[0];
          $_SESSION['name'] = $result[1];
          $_SESSION['mail'] = $result[2];
          $_SESSION['password'] = $result[3];

        } else {

          $_SESSION['error'] = 'メールアドレスまたはパスワードが正しくありません。';
          header('Location: login.php?error=メールアドレスまたはパスワードが正しくありません。');
          exit;

        }

        // エラー処理

      }
    ?>


    <main>
      <div id="main_column">
        <?php //foreach ($plans as $plan): ?>
          <!-- <a class="plan" href=""> -->
            <?php //?= $plan ?>
          <!-- </a> -->
        <?php //endforeach; ?>
      </div>
      <div id="side_column">

        <?php if(empty($_SESSION['user'])): ?>
          <a class="button" href="login.php">Login</a>
          <a class="button" href="signup.php">Signup</a>
        <<?php else: ?>
          <div id="side_calendar">Calendar</div>
          <a class="button" href="">Make new plan!</a>
          <!-- Lists 実装予定 -->
        <?php endif; ?> <!-- セミコロン必要？ -->

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>