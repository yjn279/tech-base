<?php


  include 'main.php';
  include 'plans.php';

  $pdo = connection_db();

  $make_plan = make_plan($pdo, 0, 'title', 'schedule', 'comment');
  $get_plan = get_plan($pdo);

  echo ($make_plan);
  // var_dump($get_plan);

  foreach($get_plan as $plan) {
    foreach ($plan as $p) {
      echo $p;
    }
  }


?>