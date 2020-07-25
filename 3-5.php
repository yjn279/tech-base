<!DOCTYPE html>
<html lang ="ja">
    <head>
        <meta charset ="UTF-8">
        <title>mission_3-5</title>
    </head>
    <body>
            <?php
            $filename ="mission_3-5.txt";
            $text =$_POST["text"];
            $comment =$_POST["comment"];
            $date =date(Y年m月d日　H時i分s秒);
            $NO =$_POST["NO"];
            $edit_number=$_POST["number"];
            $toukou_num=$_POST["toukou_num"];                    //$toukou_numをPOST受信
            $password=$_POST["password"];
            $password_delete=$_POST["password_delete"];
            $password_edit=$_POST["password_edit"];
            //POST受信するものを纏めて書いておく
            
             if(file_exists($filename)){
                $array=file($filename);                     //ファイルを読み込む
                foreach($array as $items){                  //ファイルの中身を代入しループ処理
                    $item =explode("<>",$items);            //投稿を分解
                    $num=$item[0]+1 ;                       //投稿番号は前の投稿に+1した数
                }
            }else{
                $num =1;                                   //投稿がなければ１から始める
            }
            
            $str = $num ."<>". $text . "<>". $comment. "<>". $date . "<>". $password."<>".PHP_EOL;
            if(!empty($_POST["text"]) && !empty($_POST["comment"]) && !empty($_POST["password"]) && $_POST["toukou_num"]=="") {
            $fp1 =fopen($filename,"a");
            fwrite($fp1,$str);
            }  
            
            
            //削除フォーム
            $lines=file($filename);
            if ($NO != "") {
                $fp1 = fopen($filename, 'w');  // wモードでファイル開く

                foreach ($lines as $line) {
                    $item=explode("<>",$line);
                
                    if ($item[0]!= $NO) {          
                        fwrite($fp1,$line); //一致しなかった要素をファイルに書き込む

                    } else {
                        if ($password_delete == $item[4]) {
                            continue;

                        } else {
                            fwrite($fp1,$line);
                        }

                    }
                }

                fclose($fp1);

            }
         
         //編集フォーム
         $array=file($filename,FILE_IGNORE_NEW_LINES);  //$filenameを読み込む
         foreach($array as $items){                     //ファイルの中身を代入しループ処理
                    $item =explode("<>",$items);               //投稿番号の取得
         
         if($edit_number!="" && $password_edit == $item[4]){  //編集フォームのパスワードと投稿フォームのパスワードが一致したら
                    if($edit_number==$item[0]){                //編集したい番号と投稿番号が一致したら、
                    $data0=$item[0];
                    $data1=$item[1];                          //名前とコメントの情報を取得
                    $data2=$item[2];
                   
                    
                    }
                }
                         
            }
                 
            ?>
        <form method ="POST" action="">
            <input type ="hidden" name="toukou_num" value="<?php echo $data0;?>">
            <input type ="text" name="text" placeholder ="名前" value="<?php echo $data1;?>">
            <input type ="comment" name="comment" placeholder ="コメント" value="<?php echo $data2;?>">
            <input type ="text" name="password" placeholder="パスワード">
            <input type ="submit" name="submit"><br><br>
        <form method ="POST" action ="">
            <input type = "number" name="NO" placeholder ="削除対象番号">
            <input type = "test" name="password_delete" placeholder ="パスワード">
            <input type = "submit" name="delete" value ="削除"><br><br>
        <form method="POST" action="">
            <input type= "number" name="number" placeholder="編集対象番号">
            <input type= "text" name="password_edit" placeholder="パスワード">
            <input type= "submit" name="submit" value="編集">
        </form>
        
        <?php
            if($toukou_num!="" && !empty($password)){       //$toukou_numと$passwordが空ではない場合  
                $array=file($filename);  //$filenameを読み込む
                $fp1 =fopen($filename,"w");          //ファイルをｗモードで開く
                foreach($array as $items){                     //ファイルの中身を代入しループ処理
                    $item =explode("<>",$items);       //投稿番号の取得
            
                if($toukou_num==$item[0]){                //$toukou_numと投稿番号が一致したら、
                    fwrite($fp1,$toukou_num."<>".$text."<>".$comment."<>".$date."<>". $password."<>".PHP_EOL);       //差し替える投稿を記入
                }else{
                    fwrite($fp1,$items); //編集されないものはそのまま記入
                }
            }   
            fclose($fp1);
        }
      
        
        $array =file($filename,FILE_IGNORE_NEW_LINES);
            foreach($array as $items){
                $item =explode("<>",$items);
                echo $item[0]."<br>";
                echo $item[1]."<br>";
                echo $item[2]."<br>";
                echo $item[3]."<br>";
            }
        
    ?>

       
 
    </body>
</html>