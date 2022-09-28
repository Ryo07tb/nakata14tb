<!DOCTYPE html>
<html lang="ja" >
  <head>
    <meta charset="utf-8">
    <title>mission3-4</title>
  </head>
  <body>
 <h1>コメントの送信</h1>
     <form action="" method="post">
        <div>
            <label for = "name">名前</label>
            <input type ="text"  name = "name" value = "<?php if(isset($editname)){echo $editname;} ?>">
            <label for = "comment">コメント</label>
            <input type = "text"  name = "comment" value = "<?php if(isset($editcomment)) {echo $editcomment;} ?>">
            <input type = "hidden" name ="editNO" value = "<?php if(isset($editnumber)) {echo $editnumber;} ?>"> 
            <input type = "submit" name ="sub1" value = "送信" >
        </div>
        <div>
            <input type = "number" name = "delete" min = "1" placeholder="削除対象番号">
            <input type = "submit" name = "sub1" value = "削除">
        </div>
        <div>
            <input type = "number" name = "edit" min = "1" placeholder = "編集対象番号">
            <input type = "submit" name = "sub1" value = "編集">
        </div>
    </form>
   <?php //テキストに記述
    if(isset($_POST["submit"]) ){
        //特殊文字をエンティティに変換する
      $kbn = htmlspecialchars($_POST["sub1"],ENT_QUOTES, "UTF-8");
       //ボタンによって処理を変える
      switch($kbn){
          //入力フォーム
          case "送信": 
            if(!empty($_POST["name"]) && !empty($_POST["comment"]) ){
                $name = $_POST["name"];
                $comment = $_POST["comment"];
                $date = date("Y年m月d日 H時i分s秒");
                
            //新規投稿の場合
            if($_POST["editNO"] == "") {
            $filename = "mission_3-4.txt";
            
            $fp = fopen($filename, "a");
            
            if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            if (end($lines) == ""){
                $i = 0;
            }else{
                $i = explode("<>",end($lines));
                $i = $i[0];
            }
            }else{
            $i = 0;
            }
            $i++;
            fwrite($fp, $i . "<>" .$name . "<>" . $comment  . "<>" .$date . PHP_EOL);
            fclose($fp);
        }else{
            //編集の場合
            if($_POST["editNO"] != "") {
                $filename = "mission_3-4.txt";
            $editNO = $_POST["editNO"];
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            foreach($lines as $line){
                $edi = explode("<>", $line);
                if($edi[0] == $editNO){
                    fwrite($fp, $editNO . "<>" . $name . "<>" . $comment. "<>" . $date . PHP_EOL);
                }else{
                    fwrite($fp, $line . PHP_EOL);
                }
            }
            fclose($fp);
        }}
        }
           ;break;
           //削除フォーム
          case "削除":
              $del = $_POST["delete"];
              $filename = "mission_3-4.txt";
              $lines = file($filename, FILE_IGNORE_NEW_LINES);
              $fp = fopen($filename, "w");
              for($i = 0; $i < count($lines); $i++){
                  $line = explode("<>", $lines[$i]);
                  $postnum = $line[0];
                  if($postnum != $del){
                      fwrite($fp, $lines[$i] . PHP_EOL);
                  }
                  }
              
              fclose($fp);
               ;break;
            //編集フォーム
          case "編集" :
              $edit = $_POST["edit"];
              $filename = "mission_3-4.txt";
              $lines = file($filename, FILE_IGNORE_NEW_LINES);
              foreach($lines as $line){
                  $editdata = explode("<>", $line);
                  if($edit == $editdata[0]){
                    $editnumber = $editdata[0];  
                    $editname = $editdata[1];
                    $editcomment = $editdata[2];
          
      }}
          
      }}
       $filename = "mission_3-4.txt";
           //表示機能
           if(file_exists($filename)){
           $lines = file($filename,FILE_IGNORE_NEW_LINES);
           foreach($lines as $line){
           $elements = explode("<>", $line);
           for($i = 0 ; $i < count($elements); $i++){
           echo $elements[$i] . " "  ;
           }
           echo "<br>";}}

?>
  </body>
</html>