<?php


  // インクルード

  include '../libraries/main.php';
  $users = new Users();


  // リダイレクト

  redirect('timeline.php', empty($_GET['from'] || $_POST['email'] || $_POST['password']));
  redirect('timeline.php', $_GET['from'] != 'login');


  // フォームデータの取得

  $email = $_POST['email'];
  $password = $_POST['password'];


  // アカウントの認証
  list($user, $name) = $users -> login($email, $password);


  // セッションの管理

  if (!empty($user) && !empty($name)) {

    $_SESSION['user'] = $user;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    redirect('timeline.php');

  } else {

    $_SESSION['error'] = 'メールアドレスまたはパスワードが正しくありません。';
    redirect('login.php');

  }
?>