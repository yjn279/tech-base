<?php

  // DB接続

  $dsn = 'mysql:dbname=tb220145db;host=localhost';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';

  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


  // テーブル作成

  $sql = "CREATE TABLE IF NOT EXISTS tbtest421 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(32),
    comment TEXT
  );";

	$stmt = $pdo->query($sql);


?>