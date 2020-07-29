<?php


  class Plans extends DataBase {

    // make_plan -> make に変更
    function make_plan(string $user, bool $original, string $title, string $schedule, string $comment=NULL, lob $image=NULL) {

      $user = (int) $this -> escape($user);
      $title = $this -> escape($title);
      $schedule = $this -> escape($schedule);
      $comment = $this -> escape($comment);
      $image = $this -> escape($image);
      $original = $original ? 1 : 0;

      $stmt = $this->pdo -> prepare('INSERT INTO plans (title, schedule, comment, image, users_id, original) VALUES(:title, :schedule, :comment, :image, :user, :original)');
      $stmt -> bindParam(':title', $title);
      $stmt -> bindParam(':schedule', $schedule);
      $stmt -> bindParam(':comment', $comment);
      $stmt -> bindParam(':image', $image, PDO::PARAM_LOB);
      $stmt -> bindParam(':user', $user, PDO::PARAM_INT);
      $stmt -> bindParam(':original', $original, PDO::PARAM_INT);
      $stmt -> execute();  // 実行が失敗した場合のエラー処理
    
      return (int) $this->pdo -> lastInsertId();
    
    }


    function edit_plan(string $id, string $title, string $schedule, string $comment=NULL, lob $image=NULL) {

      $id = (int) $this -> escape($id);
      $title = $this -> escape($title);
      $schedule = $this -> escape($schedule);
      $comment = $this -> escape($comment);
      $image = $this -> escape($image);

      $stmt = $this->pdo -> prepare('UPDATE plans SET title=:title, schedule=:schedule, comment=:comment, image=:image WHERE plans_id = :id');
      $stmt -> bindParam(':title', $title);
      $stmt -> bindParam(':schedule', $schedule);
      $stmt -> bindParam(':comment', $comment);
      $stmt -> bindParam(':image', $image, PDO::PARAM_LOB);
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
      $stmt -> execute();  // 実行が失敗した場合のエラー処理
    
      return $id;

    }


    function delete(string $id) {

      $id = (int) $this -> escape($id);

      $sql = 'DELETE FROM plans WHERE plans_id=:id';
      $stmt = $this->pdo -> prepare($sql);
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
      $stmt -> execute();
      
    }


    function get_plan(string $id) {

      $id = (int) $this -> escape($id);    
      $stmt = $this->pdo -> prepare("SELECT * FROM plans WHERE plans_id = :id");
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
      $stmt -> execute();
      // エラー処理
    
      return $stmt -> fetchAll();
    
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