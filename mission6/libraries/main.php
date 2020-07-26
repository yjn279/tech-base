<?php


  // インクルード  

  include 'database.php';
  include 'users.php';
  include 'plans.php';


  // ページ管理
  function from() {

    $from = $_SESSION['from'];
    $_SESSION = basename(__FILE__, '.php');

    return $from;

    }

  
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