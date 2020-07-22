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


      // インクルード
      include 'libraries/main.php';

      // DB接続
      $pdo = connection_db();


      // from signup

      if (isset($_POST['signup'])) {


        // フォームデータの取得

        $name = escape($_POST['name']);
        $email = escape($_POST['email']);
        $password = escape($_POST['password']);


        // アカウントをDBへ登録

        $stmt = $pdo -> prepare('INSERT INTO users (name, mail, password) VALUES(:name, :email, :password)');
        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();  // 実行が失敗した場合のエラー処理
        // 既に登録されているアカウントに対するエラー処理


        // セッションの登録

        $_SESSION['user'] = (int) $pdo -> lastInsertId();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;


        // エラー処理


      }


      // from login

      elseif (isset($_POST['login'])) {


        // フォームデータの取得

        $email = escape($_POST['email']);
        $password = escape($_POST['password']);
        

        // users_idの取得

        $stmt = $pdo -> prepare('SELECT * FROM users WHERE mail=:email AND password=:password');
        $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch();


        // セッションの管理

        if (isset($result[0])) {

          $_SESSION['user'] = $result[0];
          $_SESSION['name'] = $result[1];
          $_SESSION['email'] = $result[2];
          $_SESSION['password'] = $result[3];


        }
        
        
        // from the other
        
        else {

          $_SESSION['error'] = 'メールアドレスまたはパスワードが正しくありません。';
          header('Location: login.php');
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
          <a class="button" href="make_plan.php">Make new plan!</a>
          <!-- Lists 実装予定 -->
        <?php endif ?>

      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>