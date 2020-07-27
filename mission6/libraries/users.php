<?php


  class Users extends DataBase {


    function signup(string $name, string $email, string $password) {

      $name = $this -> escape($name);
      $email = $this -> escape($email);
      $password = $this -> escape($password);

      $stmt = $this->pdo -> prepare('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
      $stmt -> bindParam(':name', $name);
      $stmt -> bindParam(':email', $email);
      $stmt -> bindParam(':password', $password);
      $stmt -> execute();  // 実行が失敗した場合のエラー処理
      // 既に登録されているアカウントに対するエラー処理
    
      return (int) $this->pdo -> lastInsertId();
    
    }
    
    
    function login(string $email, string $password) {

      $email = $this -> escape($email);
      $password = $this -> escape($password);
      
      $stmt = $this->pdo -> prepare('SELECT * FROM users WHERE email=:email AND password=:password');
      $stmt -> bindParam(':email', $email);
      $stmt -> bindParam(':password', $password);
      $stmt -> execute();
      $result = $stmt -> fetch();
    
      return array((int) $result['users_id'], $result['name']);
    
    }


    function get_user(int $id) {

      $stmt = $this->pdo -> prepare('SELECT name FROM users WHERE users_id=:id');
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
      $stmt -> execute();
      $result = $stmt -> fetch();
    
      return $result['name'];
    
    }
  }
?>