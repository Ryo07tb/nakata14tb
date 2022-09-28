<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>mission3-2</title>
  </head>
  <body>
 <h1>コメントの送信</h1>
    <form action="m3-2.php" method="post">
      <input type="text" name="name" value="名前" placeholder="名前を入力してください" required><br>
      <input type="text" name="comment" value="コメント" placeholder="コメントを入力してください" required><br>
      <input type="submit" value="送信">
    </form>
   <?php //テキストに記述
  $filename = 'mission3-2.txt';
  $date=date('Y年m月d日 H時i分');//日付
  if(!empty($_POST["name"])&&!empty($_POST["comment"])) {
  if(file_exists($filename)){
      $name=$_POST["name"];
      $comment=$_POST["comment"];
      $number=count(file($filename))+1;
   
    }else{
        $number=1;
        $name=$_POST["name"];
        $comment=$_POST["comment"];
    }
    $fp=fopen($filename,"a");
    fwrite($fp,$number."<>".$name."<>".$comment."<>".$date.PHP_EOL);
    fclose($fp);
    }
     $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        $explode =explode("<>",$line);
        echo $explode[0].$explode[1].$explode[2].$explode[3]. "<br>";
    
}

?>
 
  </body>
</html>