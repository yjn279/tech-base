<?php


  // インクルード

  include '../libraries/main.php';
  $users = new Users();


  // リダイレクト

  redirect('timeline.php', empty($_POST['email'] || $_POST['password']));


  // フォームデータの取得

  $email = $_POST['email'];
  $password = $_POST['password'];


  // アカウントの認証
  list($user, $name) = $users -> login($email, $password);


  // セッションの管理

  if ($user >= 0) {

    $_SESSION['user'] = $user;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    redirect('../timeline.php');

  } elseif ($user == -1) {
    redirect('../login.php?error=1');

  } else {
    redirect('../login.php?error=2');
  }
?>