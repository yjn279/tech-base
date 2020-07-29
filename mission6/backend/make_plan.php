<?php


  // インクルード

  include 'libraries/main.php';
  $plans = new Plans();


  // リダイレクト

  redirect('timeline.php', empty($_SESSION['user'] || $_GET['from'] || $_POST['title'] || $_POST['schedule']));
  redirect('timeline.php', $_GET['from'] != 'make_plan');


  // データの取得

  $title = $_POST['title'];
  $schedule = $_POST['schedule'];
  $comment = $_POST['comment'];
  $image = NULL;  // $_POST['image'];
  $name_id = $_SESSION['user'];


  // プランの登録
  $id = $plans -> make_plan($user, TRUE, $title, $schedule, $comment, $image);


  // リダイレクト
  redirect("plan.php?id=$id")


?>