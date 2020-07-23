<?php


  class DataBase {


    public $pdo;

    
    function __construct() {

      // session_start();

      $dsn = 'mysql:dbname=tb220145db;host=localhost';
      $user = 'tb-220145';
      $password = 'YXAzZ7AChH';

      $this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    }


    // エスケープ処理

    function escape(string $string) {
      return htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8');
    }

    
  }
?>