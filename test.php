<?php


  // DB接続

  $dsn = 'mysql:dbname=tb220145db;host=localhost;charset=utf8mb4';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';

  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


  // テーブル作成

  $sql = 'ALTER TABLE mission5 DEFAULT CHARACTER SET utf8mb4';

  $stmt = $pdo->query($sql);


?>