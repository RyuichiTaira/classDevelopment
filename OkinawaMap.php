<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
    </head>

    <body>
       <h1>画像アップロード</h1>
        
        <form action="OkinawaMap.php" method="post" enctype="multipart/form-data">
            <div>
                <p>アップロード画像</p>
                <input type="file" name="image">
            </div>
            <input type="submit" value="決定">
        </form>

       <?php 
        $a = mt_rand();
        echo $a;
        echo '<br>';
        $b = getimagesize($_FILES['image']['tmp_name']);
        var_dump($b["mime"]);
        echo '<br>';
        move_uploaded_file($_FILES['image']['tmp_name'], 'album/'.$_FILES['image']['name']);
        echo "<br>";
        var_dump($_FILES);
        ?>
    </body>

</html>