<?php 
    $images = array();//画像ファイルのリストを格納する配列

    //画像フォルダから画像のファイル名を読み込む
    if($handle = opendir('./album')){
        while($entry = readdir($handle)){
            //「.」「..」でないとき、ファイルをファイル名に追加
            //if($entry != "." && $entry != ".."){
                $images[] = $entry;
            //}
        }
        closedir($handle);
    }
?>
<!doctype html>
<html>

<head>
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
</head>
<body>
    <h1>アルバム</h1>
<?php
    if(count($images) > 0){
        foreach($images as $img){
            echo "<img src = ./album/$img>";
            echo "<br>";
            var_dump($img);
        }
    }else{
        echo "<div>画像はまだありません</div>";
    }

?>
</body>
</html>