<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3</title>
</head>
<body>
    <?php
        //投稿内容の取得
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");
        $delete_num = $_POST["delete_num"];
        $edit_num = $_POST["edit_num"];
        $pass = $_POST["password"];
        $edit_pass = $_POST["edit_password"];
        $delete_pass = $_POST["delete_password"];  // delete_pass -> delete_password
        
        //ファイル名の指定
        $filename = "mission_3-5.txt";
        
        
        if(!empty($_POST["name"])&&($_POST["comment"])&&($_POST["password"])){
            //投稿機能
            if(empty($_POST["edit_NO"])){
                //新規投稿番号の取得
                if(file_exists($filename)){
                $lines = file($filename);
                $num = count($lines) + 1;
                }else{
                    $num = 1;
                }
        
                //取得情報の結合
                $str = $num."<>".$name."<>".$comment."<>".$date."<>".$pass."<>".PHP_EOL;
                
                $fp = fopen($filename,"a");
                fwrite($fp,$str);
                fclose($fp);
            }else{
                //編集実行機能
                $edit_NO = $_POST["edit_NO"];
                
                $edit_lines = file($filename);
                $fp = fopen($filename,"w");
                foreach($edit_lines as $edit_line){
                    $edit_item = explode("<>",$edit_line);
                    if($edit_NO == $edit_item[0]){
                        fwrite($fp,$edit_NO."<>".$name."<>".$comment."<>".$date."<>".$pass."<>".PHP_EOL);
                    }else{
                        fwrite($fp,$edit_line);
                    }
                }
                fclose($fp);
            }
        }
        
        
        //編集選択機能
        if(!empty($_POST["edit_num"]) && !empty($_POST["edit_password"])){
            
                $e_lines = file($filename);
                $fp = fopen($filename,"a");
                foreach($e_lines as $e_line){
                    $e_item = explode("<>",$e_line);
                    
                    //編集番号とパスワードが一致
                    if($edit_num == $e_item[0] && $edit_pass == $e_item[4]){
                        $edit_name = $e_item[1];
                        $edit_comment = $e_item[2];
                    }
                }
                fclose($fp);
            
        }
        
        //削除機能
        if(!empty($_POST["delete_num"]) && !empty($_POST["delete_password"])){
            $delete_lines = file($filename);
            $fp2 = fopen($filename,"w");
            fwrite($fp2,"");
            foreach($delete_lines as $delete_line){
                $del_item = explode("<>",$delete_line);

                // 削除しない投稿のとき
                if($delete_num!=$del_item[0]){  // すべて書き込む（パスワードは関係なし）
                    fwrite($fp2,$delete_line);

                // 削除する投稿のとき
                } elseif ($delete_pass!=$del_item[4]) {  // パスワードが違ったら書き込む（削除しない）、パスワードが合ってたら書き込まない（削除する）
                    fwrite($fp2,$delete_line);
                }
            }
            fclose($fp2);
        }
    
    ?>
    
    <!--投稿フォーム-->
    <form action="" method="post">
        <input type="text" name="name" placeholder="名前" 
        value="<?php if(!empty($edit_name)){
                            echo $edit_name;}?>"><br>
        <input type="text" name="comment" placeholder="コメント" 
        value="<?php if(!empty($edit_comment)){
                            echo $edit_comment;}?>"><br>
        <input type="text" name="password" placeholder="パスワード">
        <input type="hidden" name="edit_NO" 
        value="<?php if(!empty($edit_num)){echo $edit_num;}?>">
        <input type="submit" name="submit">
    </form>
    <br>
    <!--削除フォーム-->
    <form action="" method="post">
        <input type="number" name="delete_num" placeholder="削除番号"><br>
        <input type="text" name="delete_password" placeholder="パスワード">
        <input type="submit" name="submit" value="削除">
    </form>
    <br>
    <!--編集フォーム-->
    <form action="" method="post">
        <input type="number" name="edit_num" placeholder="編集番号"><br>
        <input type="text" name="edit_password" placeholder="パスワード">
        <input type="submit" name="submit" value="編集">
    </form>
        
    <?php
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            
            foreach($lines as $line){//ループ処理
                $item = explode("<>",$line);//文字列の分割
                echo $item[0]." " .$item[1]." " .$item[2]." " .$item[3]."<br>";
            }
        }
    ?>
</body>
</html>