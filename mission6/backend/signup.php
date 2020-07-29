<?php


  // インクルード

  include 'libraries/main.php';
  $users = new Users();


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