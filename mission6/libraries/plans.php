<?php


  class Plans extends DataBase {

    
    function make_plan(string $user, string $title, string $schedule, string $comment=NULL, lob $image=NULL) {

      $user = (int) $this->escape($user);
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
    
    
    function get_plans(string $where=NULL, $condition=NULL, string $select='*') {
    
      if (isset($where) && isset($condition)) {
    
        $stmt = $this->pdo -> prepare("SELECT $select FROM plans WHERE $where = :condition");
        // $stmt -> bindParam(':where', $where);
        $stmt -> bindParam(':condition', $condition);
        $stmt -> execute();
        // エラー処理
    
      } else {
        $stmt = $this->pdo -> query("SELECT $select FROM plans");
      }
    
      return $stmt -> fetchAll();
    
    }
  }
?>