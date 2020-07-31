<?php


  // インクルード

  include '../libraries/main.php';
  $users = new Users();


  // リダイレクト

  redirect('timeline.php', empty($_POST['name'] || $_POST['email'] || $_POST['password']));


  // フォームデータの取得

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  
  // アカウントの登録
  $user = $users -> signup($name, $email, $password);
  
  
  // セッションの管理

  if ($user >= 0 && !empty($name)) {

    $_SESSION['user'] = $user;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    redirect('../timeline.php');

  } else {

    redirect('../signup.php?error=TRUE');

  }


?>