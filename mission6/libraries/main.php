<?php


  // DB接続

  function connection_db($dsn, $user, $password) {
    return new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }


  // エスケープ処理
  function escape($var) {
    return htmlspecialchars($var, ENT_QUOTES|ENT_HTML5, 'UTF-8');
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
  $pdo = connection_db('mysql:dbname=tb220145db;host=localhost', 'tb-220145', 'YXAzZ7AChH');

  
?>