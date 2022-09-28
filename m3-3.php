<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>mission3-3</title>
  </head>
  <body>
 <h1>コメントの送信</h1>
    <form action="m3-3.php" method="post">
      <input type="text" name="name" value="名前" placeholder="名前を入力してください" ><br>
      <input type="text" name="comment" value="コメント" placeholder="コメントを入力してください" ><br>
      <input type="submit" value="送信"><br>
      <input type="text" name="deleteNo" placeholder="削除対象番号">
　　　<input type="submit" value="削除">
    </form>
   <?php //テキストに記述
  $date=date('Y年m月d日 H時i分');//日付
  $filename = 'mission3-3-16.txt';
   if(!empty($_POST["name"])&&!empty($_POST["comment"])) {

  $fp = fopen($filename,'a');
   $num = count( file($filename))+1; /*ファイルのデータの行数をかぞえて＄numに代入*/
    $a=$num."<>". $_POST["name"]."<>". $_POST["comment"]."<>". $date;
  fwrite($fp ,$a.PHP_EOL);
  fclose($fp);
  echo "書き込み成功！<br>";
  }
  if(!empty($_POST["deleteNo"])){//空っぽじゃなかったら
  $lines=file($filename,FILE_IGNORE_NEW_LINES);//テキストファイルを読み込み
  $kakikomi=fopen($filename,'w');//上書き書き込みする
 
  for($i=1; $i<count($lines);$i++){//ループ処理
  if($i!= $_POST["deleteNo"]){//削除番号と投稿番号一致ししなかったら
  fwrite($kakikomi,$i."<>". $_POST["name"]."<>". $_POST["comment"]."<>". $date.PHP_EOL);//書き込み処理
 }else{
  continue;
  }
  }
  fclose($kakikomi);
 }else{
     echo "enter delete_number<br>";
 }
 if(file_exists($filename)){
    $lines = file($filename,FILE_IGNORE_NEW_LINES);
    foreach($lines as $line){
        //要素を" "で分割して配列に格納
        $explode =explode("<>",$line);
        echo $explode[0].$explode[1].$explode[2].$explode[3]. "<br>";
    }
}
?>
  </body>
</html>