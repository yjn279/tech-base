<?php


  // インクルード
  
  include 'libraries/main.php';
  
  $plans = new Plans();
  redirect(empty($_GET['from']) || $_GET['id'] || $_SESSION['user']), 'timeline.php');


  $user = $_SESSION['user'];
  $from = $_GET['from'];
  $id = $_GET['id'];
  $plan = $plans -> get_plan($id);
  $name_id = $plan['users_id'];

  if ($from == 'plan' && $user == $name_id) $plans -> delete($id);

  redirect('timeline.php');

  
?>