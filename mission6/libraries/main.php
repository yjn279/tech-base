<?php


  // DB接続

  function connection_db() {

    $dsn = 'mysql:dbname=tb220145db;host=localhost';
    $user = 'tb-220145';
    $password = 'YXAzZ7AChH';

    return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  }


  // エスケープ処理
  function escape(string $string) {
    return htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8');
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