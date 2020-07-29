<?php


  // インクルード  

  include 'database.php';
  include 'users.php';
  include 'plans.php';


  // セッション管理

  function redirect(bool $condition, string $location = 'login.php') {
    
    if ($condition) {
      header("Location: $location");
      exit;
    }
    
  }


  // エラー表示

  function echo_error() {
    if(isset($_SESSION['error'])) {

      echo "<p>{$_SESSION['error']}</p>";
      unset($_SESSION['error']);

    }
  }
  

  // 自動実行
  session_start();


?>