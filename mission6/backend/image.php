<?php


  // インクルード
  include '../libraries/main.php';
  $plans = new Plans();


  // リダイレクト
  redirect('timeline.php', empty($_GET['id']));


  // データの取得

  $id = $_GET['id'];
  $plan = $plans -> get_plan($id);
  $image = $plan['image'];


  // 拡張子を判別

  $handle = finfo_open(FILEINFO_MIME_TYPE);
  $mime = finfo_buffer($handle, $image);
  finfo_close($handle);

  header("Content-Type: image/$mime");
  echo $image;


?>