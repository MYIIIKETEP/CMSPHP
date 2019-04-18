<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    //Создаем аррей
    $myArray = array(1,2,3);
    $tAr = array(23, 45, 54, 12, 77);
    echo "$tAr[0] , $tAr[4] <br>";
    //Работает как с объектами, можно заменять на месте
    $tAr[4] = 1;
    echo $tAr[4] . "<br>";
    //sort($array); - alph sortering
    //rsort($sort); - reverse sort
    //count($array); - som .length i JS
    //shuffle($array); - shuffle
    //push($array,  newItem);
    $countArray = array(1, 2, 3, 4, 5);
    for ($i=0; $i < count($countArray); $i++) { 
        echo $countArray[$i];
    };
    echo "<br>";
    $sum = $countArray[0];
    $sum1 = 0;
    foreach ($countArray as $counts) {
        $sum = $sum * $counts;
        echo $sum . "<br>";
        
    };
    //strlen($variabel) считает сколько символов в стринге
    $ok_array = array("fine", "FINE", "good", "what is this stuff?", "sweet", "i don't even live here");

    foreach ($ok_array as $go) {
        if(strlen($go)<=5){
            echo $go . " ";
        };
    }
    echo "<br>";
    

    $worst_array_yet = array("string", true, 42, "another string", 54, true, 12);
    $wut = 0;
    foreach ($worst_array_yet as $lolz) {
        if(is_string($lolz)){
            echo $lolz . "<br>";
        }
        else {
        $wut += $lolz;
        };
        echo $wut;
    };
    echo "<br>";
 $lolp = [
     "Test1" => "1Test1",
     "Test2" => "2Test2",
     "Test3" => "3Test3"
 ];
//Возможность искать что либо в арее
foreach ($lolp as $key => $value) {
    if($key == "Test2"){
        echo $key . " " . $value;
    }
    # code...
}




    ?>
</body>
</html>