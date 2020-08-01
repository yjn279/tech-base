<?php


  class DataBase {


    public $pdo;

    
    function __construct() {

      $dsn = 'mysql:dbname=dbname;host=localhost';
      $user = 'user';
      $password = 'password';

      $this->pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    }


    // エスケープ処理

    function escape(string $string=NULL) {
      return htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8');
    }


    // 画像圧縮

    function compress_img(string $file) {

      $rate = 5;  // 圧縮率
      $new_width = $width/$rate;  // 圧縮後の横幅
      $new_height = $height/$rate;  // 圧縮後の横幅

      list($width, $height) = getimagesize($file);  // 画像サイズの取得
      $image = file_get_contents($file);  // 画像データの読み込み

      $new_image = imagecreatetruecolor($new_width, $new_height);  // 新規画像作成

      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);  // 元の画像を圧縮

      return file_get_contents($new_image);

    }
  }
?>