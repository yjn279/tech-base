<?php


  include 'main.php';

  $plans = new Plans();
  
  foreach ($plans->get_plans() as $plan) {
    foreach ($plan as $p) {
      echo $p;
    }
  }


?>