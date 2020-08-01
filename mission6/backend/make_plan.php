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
  $image = $plans -> compress_img($_FILES['image']['tmp_name']);


  if ($original == 'FALSE') {

    $id = $_GET['id'];
    $img_del = $_POST['img_del'];
    $plan = $plans -> get_plan($id);

    if (!empty($img_del))  $image = NULL;
    elseif (empty($image)) $image = $plan['image'];

  }

  
  // プランの登録
  $id = $plans -> make_plan($user, $original, $title, $schedule, $comment, $image);

  
  // リダイレクト
  redirect("../plan.php?id=$id");


?>