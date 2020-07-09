<!DOCTYPE html>
<html lang ="ja">
    <head>
        <meta charset ="UTF-8">
        <title>mission_3-2</title>
    </head>
    <body>
        <form method ="POST" action="">
        <input type  ="text" name ="text" placeholder ="名前">
        <input type ="comment" name ="comment" placeholder ="コメント">
        <input type ="submit" name ="submit">
        </form>
       
            <?php
            $filename ="mission_3-2.txt";
            $text =$_POST["text"];
            $comment =$_POST["comment"];
            $date =date(Y年m月d日　H時i分s秒);
            if(file_exists($filename)){
                $num = count(file($filename))+1 ;
            }else{
                $num =1;
            }
            
            $str = $num ."<>". $text . "<>". $comment. "<>". $date .PHP_EOL;
            if(!empty($_POST["text"]) && ($_POST["comment"])){
            $fp =fopen($filename,"a");
            fwrite($fp,$str);
            fclose($fp);
            }
            
            $filename ="mission_3-2.txt";
            $array =file($filename,FILE_IGNORE_NEW_LINES);
            foreach($array as $items){  // $item -> $items に変更
                $item =explode("<>",$items);  // $str -> $itemsに修正（$itemが分割した後、$itemsが分割する前です！）
                echo $item[0]."<br>";
                echo $item[1]."<br>";
                echo $item[2]."<br>";
                echo $item[3]."<br>";  // 投稿日時 <- なかったので付け足しました！
            }
            ?>
    </body>
</html>