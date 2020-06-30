<?php

  $dsn = 'mysql:dbname=tb220145db;host=localhost';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';
  
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

?>