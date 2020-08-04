<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission5-1</title>
    </head>
    <body>
        西村です。ご協力ありがとうございます。<br>
            ここではコメントの<br>
            ・新規作成<br>
            ・削除<br>
            ・編集<br>
            ができます。<br>
            名前・コメント・パスワードを入れて投稿してください！<br><br><br>
            
            ＊投稿フォーム<br>
        <form method ="POST" action="">
            <input type ="hidden" name="toukou_num" value=
            "<?php 
            $dsn='mysql:dbname=tb220142db;host=localhost';
            $user='tb-220142';
            $password='D7FCxjhLkW';
            $pdo= new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
             
            if(!empty($edit_number) && $edit_number==$id){
                $sql=$pdo->prepare('SELECT *FROM tb_5_1 where id=:id AND password=:password');
                $sql -> bindValue(':id',$edit_number,PDO::PARAM_INT);
                $sql -> bindValue(':password',$password_edit,PDO::PARAM_STR);
                $sql -> execute();
                $result=$sql -> fetch();
                echo $result[0];
            }
            ?>">
            <input type ="text" name="text" placeholder ="名前" value=
            "<?php 
            $dsn='mysql:dbname=tb220142db;host=localhost';
            $user='tb-220142';
            $password='D7FCxjhLkW';
            $pdo= new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
             
            if(!empty($edit_number) && $edit_number==$id){
                $sql=$pdo->prepare('SELECT *FROM tb_5_1 where id=:id AND password=:password');
                $sql -> bindValue(':id',$edit_number,PDO::PARAM_INT);
                $sql -> bindValue(':password',$password_edit,PDO::PARAM_STR);
                $sql -> execute();
                $result=$sql -> fetch();
                echo $result[1];
            }
            ?>">
            <input type ="comment" name="comment" placeholder ="コメント" value=
            "<?php
            $dsn='mysql:dbname=tb220142db;host=localhost';
            $user='tb-220142';
            $password='D7FCxjhLkW';
            $pdo= new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
             
            if(!empty($edit_number) && $edit_number==$id){
                $sql=$pdo->prepare('SELECT *FROM tb_5_1 where id=:id AND password=:password');
                $sql -> bindValue(':id',$edit_number,PDO::PARAM_INT);
                $sql -> bindValue(':password',$password_edit,PDO::PARAM_STR);
                $sql -> execute();
                $result=$sql -> fetch();
                echo $result[2];
            }
            ?>">
            <input type ="text" name="password" placeholder="パスワード">
            <input type ="submit" name="submit"><br><br>
            ＊削除フォーム<br>
        <form method ="POST" action ="">
            <input type = "number" name="NO" placeholder ="削除対象番号">
            <input type = "test" name="password_delete" placeholder ="パスワード">
            <input type = "submit" name="delete" value ="削除"><br><br>
            ＊編集フォーム<br>
        <form method="POST" action="">
            <input type= "number" name="number" placeholder="編集対象番号">
            <input type= "text" name="password_edit" placeholder="パスワード">
            <input type= "submit" name="submit" value="編集">
            <br><br>
            ＊投稿一覧<br>
        </form>
        
       <?php
       $dsn='mysql:dbname=tb220142db;host=localhost';
       $user='tb-220142';
       $password='D7FCxjhLkW';
       $pdo= new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
       
       $filename ="mission_3-5.txt";
       $text =$_POST["text"];
       $comment =$_POST["comment"];
       $date =date(Y年m月d日　H時i分s秒);
       $NO =$_POST["NO"];
       $edit_number=$_POST["number"];
       $toukou_num=$_POST["toukou_num"];        
       $password=$_POST["password"];
       $password_delete=$_POST["password_delete"];
       $password_edit=$_POST["password_edit"];
    
    
      //投稿フォーム
      if(!empty($text) && !empty($comment)){
          $sql=$pdo ->prepare("INSERT INTO tb_5_1 (name,comment) VALUES (:name,:comment)");
          $sql -> bindParam(':name',$name, PDO::PARAM_STR);
          $sql -> bindParam(':comment',$comment, PDO::PARAM_STR);
          $name=$text;
          $comment =$comment;
          $sql -> execute();
      } 
       
       //削除フォーム
       if(!empty($NO)){                    //削除番号が空ではない場合
          $id=$NO;
          $sql='delete from tb_5_1 WHERE id=:id';
          $stmt=$pdo->prepare($sql);
          $stmt->bindParam(':id',$id,PDO::PARAM_INT);
          $stmt->execute();
       }
       
       
       if(!empty($toukou_num) && !empty($password)){
         $id=$edit_number;                              //変更する投稿番号
         $name=$text;
         $comment=$comment;
         $sql='UPDATE tb_5_1 SET name=:name,comment=:comment WHERE id=:id';
         $stmt = $pdo->prepare($sql);
         $stmt->bindParam(':name',$name, PDO::PARAM_STR);
         $stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
         $stmt->bindParam(':id',$id ,PDO::PARAM_INT);
         $stmt->execute();  
       }   
           
       
       
       $sql='SELECT * FROM tb_5_1';
       $stmt=$pdo ->query($sql);
       $results=$stmt->fetchAll();
       foreach($results as $row){       //$rowのなかにはテーブルのカラム名が入る
          echo $row['id'].',';
          echo $row['name'].',';
          echo $row['comment'].'<br>';
       echo "<hr>";
       }
       
       ?> 
    </body>
</html>