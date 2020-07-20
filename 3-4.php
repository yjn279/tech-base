<!DOCTYPE html>
<html lang ="ja">
    <head>
        <meta charset ="UTF-8">
        <title>mission_3-4</title>
    </head>
    <body>
            <?php
            $filename ="mission_3-4.txt";
            $text =$_POST["text"];
            $comment =$_POST["comment"];
            $date =date(Y年m月d日　H時i分s秒);
            $NO =$_POST["NO"];
            $edit_number=$_POST["number"];
            //POST受信するものを纏めて書いておく
            
            if(file_exists($filename)){
                $num = count(file($filename))+1 ;
            }else{
                $num =1;
            }
            
            $str = $num ."<>". $text . "<>". $comment. "<>". $date .PHP_EOL;
            if(!empty($_POST["text"]) && ($_POST["comment"])){
            $fp1 =fopen($filename,"a");
            fwrite($fp1,$str);
           

            }   
            
            
            if($NO!=""){
            
                $lines =file($filename);
                $fp1 =fopen($filename,"w");
                 foreach($lines as $line){
                     $item =explode("<>",$line);
                     $suuji =$item[0];
                     if($suuji!= $NO){
                         fwrite($fp1,$line);
                     }
                 }
                 
            
            fclose($fp1);
           
           
         }
         //編集フォーム
            if($edit_number!=""){
                $array=file($filename,FILE_IGNORE_NEW_LINES);  //$filenameを読み込む
                foreach($array as $items){                     //ファイルの中身を代入しループ処理
                    $item =explode("<>",$items);               //投稿番号の取得
                    if($edit_number==$item[0]){                //編集したい番号と投稿番号が一致したら、
                    $data0=$item[0];
                    $data1=$item[1];                          //名前とコメントの情報を取得
                    $data2=$item[2];
                   
                    
                    }
                }
                         
            }
                 
            ?>
        <form method ="POST" action="">
            <input type ="number" name="toukou_num" value="<?php echo $data0;?>">
            <input type  ="text" name ="text" placeholder ="名前" value="<?php echo $data1;?>">
            <input type ="comment" name ="comment" placeholder ="コメント" value="<?php echo $data2;?>">
            <input type ="submit" name ="submit"><br><br>
        <form method ="POST" action ="">
            <input type = "number" name ="NO" placeholder ="削除対象番号">
            <input type ="submit" name="delete" value ="削除"><br><br>
        <form method="POST" action="">
            <input type= "number" name="number" placeholder="編集対象番号">
            <input type="submit" name="submit" value="編集">
        </form>
        
        <?php
        
        $toukou_num=$_POST["toukou_num"];
        if($toukou_num!=""){                                 //$toukou_numが空ではない場合                         
            $array=file($filename,FILE_IGNORE_NEW_LINES);  //$filenameを読み込む
            $fp1 =fopen($filename,"w");          //ファイルをｗモードで開く
            foreach($array as $items){                     //ファイルの中身を代入しループ処理
                    $item =explode("<>",$items);               //投稿番号の取得
                    if($toukou_num==$item[0]){                //$toukou_numと投稿番号が一致したら、
                        fwrite($fp1,$toukou_num."<>".$text."<>".$comment."<>".$date.PHP_EOL);       //差し替える投稿を記入
                    }else{
                        fwrite($fp1,$items.PHP_EOL);                    //編集されないものはそのまま記入
                        
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