<?php


  // インクルード

  include '../libraries/main.php';
  $users = new Users();


  // リダイレクト

  redirect('timeline.php', empty($_GET['from'] ||　$_GET['name'] || $_POST['email'] || $_POST['password']));
  redirect('timeline.php', $_GET['from'] != 'signup');


  // フォームデータの取得

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];


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


  // リダイレクト
  redirect('timeline');


?>