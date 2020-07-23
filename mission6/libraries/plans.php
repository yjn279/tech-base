<?php


  include 'database.php';


  class Plans extends DataBase {

    
    function make_plan(int $user, string $title, string $schedule, string $comment, lob $image=NULL) {

      $title = $this->escape($title);
      $schedule = $this->escape($schedule);
      $comment = $this->escape($comment);
      $image = $this->escape($image);

      $stmt = $this->pdo -> prepare('INSERT INTO plans (title, schedule, comment, image, users_id, original) VALUES(:title, :schedule, :comment, :image, :user, 1)');
      $stmt -> bindParam(':title', $title);
      $stmt -> bindParam(':schedule', $schedule);
      $stmt -> bindParam(':comment', $comment);
      $stmt -> bindParam(':image', $image, PDO::PARAM_LOB);
      $stmt -> bindParam(':user', $user, PDO::PARAM_INT);
      $stmt -> execute();  // 実行が失敗した場合のエラー処理
    
      return (int) $this->pdo -> lastInsertId();
    
    }
    
    
    function get_plans(string $column=NULL, $condition=NULL) {
    
      if (isset($column) && isset($condition)) {
    
        $stmt = $this->pdo -> prepare("SELECT * FROM plans WHERE $column = :condition");
        // $stmt -> bindParam(':column', $column);
        $stmt -> bindParam(':condition', $condition);
        $stmt -> execute();
        // エラー処理
    
      } elseif (empty($column) && empty($condition)) {
        $stmt = $this->pdo -> query('SELECT * FROM plans');
    
      } else {
        return -1;
      }
    
      return $stmt -> fetchAll();
    
    }
  }
?>