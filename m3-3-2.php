<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>mission3-3-2</title>
  </head>
  <body>
 <h1>コメントの送信</h1>
    <form action="m3-3-2.php" method="post">
      <input type="text" name="name" value="名前" placeholder="名前を入力してください" required><br>
      <input type="text" name="comment" value="コメント" placeholder="コメントを入力してください" required><br>
      <input type="submit" value="送信">
    </form>
   <?php //テキストに記述
  $filename = 'mission3-3-2.txt';
  if(!empty($_POST["name"])&&!empty($_POST["comment"])) {

  $fp = fopen($filename,'a');
   $num = count( file($filename)); /*ファイルのデータの行数をかぞえて＄numに代入*/
    $num++; 
  fwrite($fp ,$num.'<>'.$_POST["name"].'<>'.$_POST["comment"].'<>'.date( "Y年m月d日  H:i:s" ).PHP_EOL);
  fclose($fp);
  echo "書き込み成功！<br>";
  }
 if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
     for ($i = 0; $i < count($lines); $i++){

        // 区切り文字「<>」で分割
        $line = explode("<>",$lines[$i]);
        
            echo $line[$i];
       
    }
}
}

?>
 
  </body>
</html>