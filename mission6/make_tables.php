<?php


  // DB接続

  $dsn = 'mysql:dbname=tb220145db;host=localhost';
  $user = 'tb-220145';
  $password = 'YXAzZ7AChH';

  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


  // テーブル作成

  $tables = [

    'users (
      users_id INT ZEROFILL AUTOINCREMENT PRIMARY KEY,
      name CHAR(32),
      mail CHAR(255),
      password CHAR(255)
    )',

    'plans (
      plans_id INT ZEROFILL AUTO_INCREMENT PRIMARY KEY,
      title CHAR(64),
      schedule TEXT,
      image ?,
      comment TEXT,
      created_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
      users_id INT ZEROFILL,
      original TINYINT(1)
    )',

    'calendars (
      calendars_id INT ZEROFILL AUTO_INCREMENT PRIMARY KEY,
      users_id INT ZEROFILL,
      plans_id INT ZEROFILL,
      date DATE
    )'

  ];

  foreach ($tables as $table) {
    $sql = "CREATE TABLE IF NOT EXISTS $table";
    $stmt = $pdo -> query($sql);
  }


  // テーブルを表示

  $sql = 'SHOW CREATE TABLE users';  // すべて見れる？
  $result = $pdo -> query($sql);
  
	foreach ($result as $row){
		echo $row[1], '<br>';
  }


?>