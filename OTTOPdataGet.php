<?php
    //OTTOPからJsonデータの取得
    $a = file_get_contents('https://api.ottop.org/tourist/spots?latitude=26.185177&longitude=127.776063&category=beach&distance=10');
    //Jsonデータを連想配列に変換
    $json = json_decode($a, true);
    //OTTOPのデータを変数に格納
    $name = ($json[0]["name"]);
    $address = ($json[0]["address"]["addressLocality"] . $json[0]["address"]["postalCode"] . $json[0]["address"]["streetAddress"]);
    $description = ($json[0]["description"]);
    $image1 = ($json[0]["image"][0]);
    $image2 = ($json[0]["image"][1]);
    $image3 = ($json[0]["image"][2]);

    // var_dump($name);
    // var_dump($address);
    // var_dump($description);
    // var_dump($image1);

    //DBに接続
    $dsn = 'mysql:host=localhost;dbname=okinawa;charset=utf8';
    $user = 'ryuichi';
    $password = "saya0526";

    try{
        //PDOインスタンスの作成
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //プリペアドステートメントを作成
        $stmt = $db->prepare("
            INSERT INTO travels(Name,  Address, Discription, Image1, Image2, Image3)
            VALUES(:name, :address, :description, :image1, :image2, :image3)
        ");
        //プリペアドステートメントにパラメータを割り当てる
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image1', $image1, PDO::PARAM_STR);
        $stmt->bindParam(':image2', $image2, PDO::PARAM_STR);
        $stmt->bindParam(':image3', $image3, PDO::PARAM_STR);
        //クエリの実行
        $stmt->execute();

        echo "成功";
    }catch(PDOException $e){
        exit("エラー :" . $e->getMessage());
    }

?>