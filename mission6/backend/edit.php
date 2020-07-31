<?php


  // インクルード

  include '../libraries/main.php';
  $plans = new Plans();


  // リダイレクト
  redirect('timeline.php', empty($_SESSION['user'] || $_GET['id'] ||$_POST['title'] || $_POST['schedule']));


  // データの取得
  $user = $_SESSION['user'];
  $id = $_GET['id'];
  $title = $_POST['title'];
  $schedule = $_POST['schedule'];
  $comment = $_POST['comment'];
  $img_del = $_POST['img_del'];
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $fsize = $_FILES['image']['tmp_name'];

  $plan = $plans -> get_plan($id);
  $name_id = $plan['users_id'];

  if (!empty($img_del))  $image = NULL;
  elseif (empty($image)) $image = $plan['image'];


  // ファイルサイズの確認

  if ($fsize <= 10000000) {
  
    if ($user == $name_id) $plans -> edit_plan($id, $title, $schedule, $comment, $image);
    redirect("../plan.php?id=$id");  // リダイレクト

  } else {
    redirect("../edit.php?error=TRUE");  // リダイレクト
  }


?>