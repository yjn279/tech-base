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
      $users = new Users();
      $plans_inst = new Plans();


      // セッション管理
      $_SESSION['from'] = 'timeline';


      // from signup

      if (isset($_POST['signup'])) {


        // フォームデータの取得

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        // アカウントの登録
        $user = $users -> signup($name, $email, $password);


        // セッションの登録

        $_SESSION['user'] = $user;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;


        // エラー処理


      }


      // from login

      elseif (isset($_POST['login'])) {


        // フォームデータの取得

        $email = $_POST['email'];
        $password = $_POST['password'];
        

        // アカウントの認証
        list($user, $name) = $users -> login($email, $password);
        

        // セッションの管理

        if (isset($user)) {

          $_SESSION['user'] = $user;
          $_SESSION['name'] = $name;
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;

        } else {

          $_SESSION['error'] = 'メールアドレスまたはパスワードが正しくありません。';
          header('Location: login.php');
          exit;

        }

        // エラー処理

      }
    ?>

    <main>
      <div id="main_column">


        <?php $plans = $plans_inst -> get_plans() ?>

         <?php foreach ($plans as $plan): ?>
          <a id="plan" href="plan.php?id=<?= $plan['plans_id'] ?>">
            <img src="" alt="">
            <div>
              <h3><?= $plan['title'] ?></h3>
              <pre><?= $plan['schedule'] ?></pre>
            </div>
          </a>
        <?php endforeach ?>


      </div>
      <div id="side_column">

        <?php if(empty($_SESSION['user'])): ?>
          <a class="button" href="login.php">Login</a>
          <a class="button" href="signup.php">Signup</a>
        <?php else: ?>
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