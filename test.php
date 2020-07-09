<!DOCTYPE html>
<html lang ="ja">
    <head>
        <meta charset ="UTF-8">
        <title>mission_3-1</title>
    </head>
    <body>
        <form method ="POST" action="">
        <input type  ="text" name ="text" placeholder ="名前">
        <input type ="comment" name ="comment" placeholder ="コメント">
        <input type ="submit" name ="submit">
        </form>
       
            <?php
            $filename ="mission_3-1.txt";
            $text =$_POST["text"].PHP_EOL;
            $comment =$_POST["comment"].PHP_EOL;
            $date =date(Y年m月d日　H時i分s秒);
            if(file_exists($filename)){
                $num = count(file($filename))+1 ;
            }else{
                $num =1;
            }
            
            $str = $num ."<>". $name . "<>". $comment. "<>". $date .PHP_EOL;
            if(!empty($_POST["name"]) && ($_POST["comment"])){
            $fp =fopen($filename,"a");
            fwrite($fp,$str);
            fclose($fp);
            }
            ?>
    </body>
</html>