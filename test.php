<!DOCTYPE html>
<html lang ="ja">
  <head>
    <meta charset ="UTF-8">
    <title>mission_2-3</title>
  </head>
    <body>
      <form method ="POST" action="">
        <input type ="text" name ="text" placeholder="コメント">
        <input type ="submit" name ="submit">
      </form>
        
      <?php
      
        $str = $_POST["text"].PHP_EOL;  // $strにはPHP_EOLが必ず入ってしまう
        if($str != NULL){
          $filename = "mission_2-3.txt";
          $fp = fopen($filename, "a");
          fwrite($fp, $str);  // 書き込むときにPHP_EOLをつける
          fclose($fp);
        }

        $str =$_POST["text"];

        if($_POST["text"] == "完成！"){
          echo "おめでとう！";
        }elseif(!empty($str)){
          echo "".$_POST["text"]."を受け付けました";
        }
      
      ?>

  </body>
</html>