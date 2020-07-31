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

  if (!empty($user) && !empty($name)) {

    $_SESSION['user'] = $user;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    redirect('../timeline.php');

  } else {

    redirect('../login.php?error=TRUE');

  }
?>