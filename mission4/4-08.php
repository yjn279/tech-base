<?php

  // DB接続

  $dsn = 'mysql:dbname=tb220145db;host=localhost';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';
  
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


  // 投稿削除

  $id = 2;
  $sql = 'DELETE FROM tbtest WHERE id=:id';

  $stmt = $pdo -> prepare($sql);
  $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
  $stmt -> execute();


  // 投稿表示

  $sql = "SELECT * FROM tbtest";

  $stmt = $pdo -> query($sql);
  $stmt -> execute();

  $results = $stmt -> fetchAll();

  foreach ($results as $result) {
    echo "{$result['id']}, {$result['name']}, {$result['comment']}<br>";
  }


?>