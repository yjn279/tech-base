<?php


  function make_plan(PDO $pdo, int $user, string $title, string $schedule, string $comment, lob $image=NULL) {

    $stmt = $pdo -> prepare('INSERT INTO plans (title, schedule, comment, image, users_id, original) VALUES(:title, :schedule, :comment, :image, :user, 1)');
    $stmt -> bindParam(':title', $title, PDO::PARAM_STR);
    $stmt -> bindParam(':schedule', $schedule, PDO::PARAM_STR);
    $stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt -> bindParam(':image', $image, PDO::PARAM_LOB);
    $stmt -> bindParam(':user', $user, PDO::PARAM_INT);
    $stmt -> execute();  // 実行が失敗した場合のエラー処理

    return (int) $pdo -> lastInsertId();

  }


  function get_plan(PDO $pdo, int $id=NULL, int $uer=NULL) {

    if (isset($id)) {

      $stmt = $pdo -> prepare('SELECT * FROM plans WHERE plans_id = :id');
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);

    } elseif (isset($user)) {
      
      $stmt = $pdo -> prepare('SELECT * FROM plans WHERE users_id = :user');
      $stmt -> bindParam(':user', $user, PDO::PARAM_INT);

    } else {
      $stmt = $pdo -> prepare('SELECT * FROM plans');
    }

    $stmt -> execute();
    $plans = $stmt -> fetchAll();

    return isset($plans) ? $plans : NULL;

  }


?>