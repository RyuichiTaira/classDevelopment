<?php
    //データの受け取り
    $name = $_POST["name"];
    $title = $_POST["title"];
    $body = $_POST["body"];
    $pass = $_POST["pass"];


    //必須項目チェック
    if($name =='' || $body ==''){
        header("Location: bbs.php");
        exit();
    }

    //パスワードは4桁か？
    if(!preg_match("/^[0-9]{4}$/", $pass)){
        header("Location: bbs.php");
        exit();
    }

    //DBに接続
    $dsn = "mysql:host=localhost;dbname=practice;charset=utf8";
    $user = "ryuichi";
    $password = "saya0526";

    try{
        //PDOインスタンスの作成
        $db = new PDO($dsn, $user, $password);
        var_dump($db);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //プリペアドステートメントの作成
        $stmt = $db->prepare("
            INSERT INTO bbs(name, title, body, date, pass)
            VALUES(:name, :title, :body, now(), :pass)
        ");
        //プリペアドステートメントにパラメータを割り当てる
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':body', $body, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        //クエリの実行
        $stmt->execute();
    }catch(PDOException $e){
        exit("エラー:" . $e->getMEssage());
    }




?>