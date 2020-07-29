<?php


  // インクルード

  include 'libraries/main.php';
  $plans = new Plans();


  // リダイレクト
  redirect('timeline.php', empty($_SESSION['user'] || $_GET['id'] ||$_POST['title'] || $_POST['schedule']));


  // データの取得
  $user = $_SESSION['user'];
  $id = $_GET['id'];
  $title = $_POST['title'];
  $schedule = $_POST['schedule'];
  $comment = $_POST['comment'];
  $image = NULL;  // $_POST['image'];

  $plan = $plans -> get_plan($id);
  $name_id = $plan['users_id'];


  // プランの編集
  if ($user == $name_id) $plans -> edit_plan($id, $title, $schedule, $comment, $image);


  // リダイレクト
  redirect("plan.php?id=$id")


?>