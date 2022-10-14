<?php
    //OTTOPからJsonデータの取得
    $a = file_get_contents('https://api.ottop.org/tourist/spots?latitude=26.4221473&longitude=127.7956962&distance=100');

    $json = json_decode($a, true);

    $keys = array_keys($json);

    for($i = 0; $i < 132; $i++){
        if($json[$i]["description"] != ""){
        echo $i . ":";
        echo $json[$i]["name"] . "<br>";
        }
    }



    ?>