<?php


  // インクルード

  include '../libraries/main.php';
  $plans = new Plans();


  // リダイレクト

  redirect('timeline.php', empty($_SESSION['user'] || $_GET['original'] || $_POST['title'] || $_POST['schedule']));


  // データの取得

  $user = $_SESSION['user'];
  $original = $_GET['original'];
  $title = $_POST['title'];
  $schedule = $_POST['schedule'];
  $comment = $_POST['comment'];
  $image = NULL;  // $_POST['image'];


  // プランの登録
  $id = $plans -> make_plan($user, $original, $title, $schedule, $comment, $image);


  // リダイレクト
  redirect("../plan.php?id=$id")


?>