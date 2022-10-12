<?php
    $msg = null;
    $alert = null;

    //アップロード処理
    if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
        $old_name = $_FILES['image']['tmp_name'];
        $new_name = date("YmdHis");
        $new_name .= mt_rand();
        $size = getimagesize($_FILES['image']['tmp_name']);
        var_dump($size);
        switch($size[2]){
            case IMAGETYPE_JPEG:
                $new_name .= '.jpeg';
                break;
            case IMAGETYPE_GIF:
                $new_name .= '.gif';
                break;
            case IMAGETYPE_PNG:
                $new_name .= '.png';
                break;
            default:
                header('Location: https://www.yahoo.co.jp/');
                exit();
        }

        if(move_uploaded_file($old_name, 'album/'.$new_name)){
            $msg = "アップロードしました";
            $alert = 'success';
        }else{
            $msg = "アップロードできませんでした";
            $alert = 'danger';
        }
    }
?>



<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
    </head>

    <body>
       <h1>画像アップロード</h1>
        <?php 
            if($msg){
                echo '<div class="alert alert-'.$alert.'" role = "alert">'.$msg.'</div>';
            }        
        ?>

       <form action="upload.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
                <label>アップロードファイル</label>
                <input type="file" name="image" class="form-control-file">
           </div>
           <input type="submit" value="アップロードする" class="btn btn-primary">
       </form>
       <?php 
        var_dump($_FILES);
        ?>
    </body>

</html>