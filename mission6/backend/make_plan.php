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
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $fsize = $_FILES['image']['tmp_name'];


  // ファイルサイズの確認
  
  if ($fsize <= 10000000) {
    
    $id = $plans -> make_plan($user, $original, $title, $schedule, $comment, $image);  // プランの登録
    redirect("../plan.php?id=$id")  // リダイレクト

  } else {
    redirect("../make_paln.php?error=TRUE")  // リダイレクト
  }


?>