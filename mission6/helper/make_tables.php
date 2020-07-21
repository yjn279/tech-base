<?php


  // DB接続

  $dsn = 'mysql:dbname=tb220145db;host=localhost';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';

  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


  // テーブルの削除

  $tables = ['users', 'plans', 'calendars'];

  foreach ($tables as $table) {
    $sql ="DROP TABLE $table";
    $result = $pdo -> query($sql);
  }


  // テーブル作成

  $tables = [

    // mail -> email
    'users (
      users_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name CHAR(32),
      mail CHAR(255),
      password CHAR(255)
    )',

    // DATETIME -> DATE  imageの順番  original default
    'plans (
      plans_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      title CHAR(64),
      schedule TEXT,
      image MEDIUMBLOB,
      comment TEXT,
      created_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
      users_id INT UNSIGNED,
      original TINYINT(1)
    )',

    'calendars (
      calendars_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      users_id INT UNSIGNED,
      plans_id INT UNSIGNED,
      date DATE
    )'

  ];

  foreach ($tables as $table) {
    $sql = "CREATE TABLE IF NOT EXISTS $table";
    $stmt = $pdo -> query($sql);
  }


  // テーブルを表示

  $sql = 'SHOW TABLES';
  $result = $pdo -> query($sql);
  
	foreach ($result as $row){
		echo $row[0], '<br>';
  }


?>