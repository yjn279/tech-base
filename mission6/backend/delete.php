<?php


  // インクルード
  
  include 'libraries/main.php';
  $plans = new Plans();
  

  // リダイレクト
  redirect('timeline.php', empty($_SESSION['user']) || $_GET['from']) || $_GET['id']);


  // データの取得
  $user = $_SESSION['user'];
  $from = $_GET['from'];
  $id = $_GET['id'];

  $plan = $plans -> get_plan($id);
  $name_id = $plan['users_id'];


  // プランの削除
  if ($from == 'plan' && $user == $name_id) $plans -> delete($id);

  
  // リダイレクト
  redirect('timeline.php');

  
?>