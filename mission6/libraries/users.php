<?php


  function signup(PDO $pdo, string $name, string $email, string $password) {

    $stmt = $pdo -> prepare('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
    $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
    $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
    $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
    $stmt -> execute();  // 実行が失敗した場合のエラー処理
    // 既に登録されているアカウントに対するエラー処理

    return (int) $pdo -> lastInsertId();

  }


  function login(PDO $pdo, string $email, string $password) {
    
    $stmt = $pdo -> prepare('SELECT users_id FROM users WHERE email=:email AND password=:password');
    $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
    $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
    $stmt -> execute();
    $id = $stmt -> fetch();

    return isset($id) ? $id['users_id'] : -1;

  }


?>