<?php


  // インクルード

  include 'libraries/main.php';
  $users = new Users();


  // リダイレクト

  redirect('timeline.php', empty($_SESSION['user'] || $_GET['from'] || $_POST['title'] || $_POST['schedule']));
  redirect('timeline.php', $_GET['from'] != 'make_plan');


  // データの取得

  $title = $_POST['title'];
  $schedule = $_POST['schedule'];
  $comment = $_POST['comment'];
  $image = NULL;  // $_POST['image'];
  $name_id = $_SESSION['user'];


  // プランの登録・取得

  $id = $plans -> make_plan($user, TRUE, $title, $schedule, $comment, $image);
  $plan = $plans -> get_plan($id);
  $date = $plan['created_at'];


  // リダイレクト
  redirect("plan.php?id=$id")


?>