<?php


  //インクルード
  
  include 'libraries/main.php';
  $users = new Users();
  $plans = new Plans();


  // リダイレクト
  // redirect(empty($_SESSION['user']));


  // delete  !empty($_GET['from']) -> $_GET['from']  == delete

  $id = $_GET['id'];
  $plans -> delete($id);

  redirect(True, 'timeline.php');


?>