<?php
    
    $a = file_get_contents('https://api.ottop.org/tourist/spots?latitude=26.185177&longitude=127.776063&category=beach&distance=10');

    $b = json_decode($a, true);
    //DB Name
    echo ($b[0]["name"] . "<br>");
    //DB Description
    echo ($b[0]["description"] . "<br>");
    //DB Address
    echo ($b[0]["address"]["addressLocality"] . $b[0]["address"]["postalCode"] . $b[0]["address"]["streetAddress"]);
    //DB image
    echo ($b[0]["image"][0] . "<br>");
    echo ($b[0]["image"][1] . "<br>");
    echo ($b[0]["image"][2] . "<br>");

    


    //[0]にない要素⇒DB(InfoId, Price, Open(空白), Close(空白), MAP)



    //配列の要素ごとに表示
    // echo "<br>";
    // echo($b[0]['address']["addressLocality"]);
    // echo($b[0]['address']["streetAddress"]);
    // echo "<br>";
    // echo($b[0]['name']);
    // echo "<br>";
    // echo($b[0]["description"]);
    // echo "<br>";
    // echo($b[0]["image"]["1"]);