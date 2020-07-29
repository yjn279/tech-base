<?php


  // インクルード
  
  include 'libraries/main.php';
  
  $plan = new Plans();
  redirect(empty($_GET['from']) || empty($_SESSION['user']), 'timeline.php');


  $user = $_SESSION['user'];
  $from = $_GET['from'];
  $id = $_GET['id'];
  $plan = get_plan($id);
  $name_id = $plan['users_id'];

  if ($from == 'plan' && $user == $name_id) $plans -> delete($id);

  redirect(True, 'timeline.php');

  
?>