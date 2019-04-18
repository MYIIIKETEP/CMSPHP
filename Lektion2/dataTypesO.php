<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$firstName = "5Casper";  //new name law since this summer, probably valid name
$lastName = "Gormy";
$age = "42";
$z_index = 999;          // I'm in front of you
$is_human = true;        // 🤖?
$is_a_chair = false;     //don't label me!


//Обычное умножение
echo 'mp' . $z_index*$age . "<br>";
//cant divede by 0
//echo 'Div' .  $z_index/$is_a_chair . "<br>";
// $z_index / $is_human - True blir till 1
echo "Div " . $z_index/$is_human . " True booleans is 1 <br>";
echo 'Mp' . $is_human*$z_index . "<br>";
//string ignorerades(blev till 0);
echo "+ " . $lastName+$age . "<br>";


//Обычный квоуты присутствуют и в перменной по этому выебываються
// $_message = 'These are not the potatotes you're looking for';

//Цифра не может быть началом названия переменной
// $1message = "These are not the potatoes you're looking for";

//Будет работать
$message = "These are not the potatoes you're looking for";

//могут быть проблемы с компиляцией на других оперативках изза отсутствия символа в раскладке
// $jävla_skit = "These are not the potatoes you're looking for";

//все ок
$Message1 = 'These are not the potatoes you\'re looking for';



$number = 10;
$result = $number % 2;
echo "Resten av talet modulos 2 är: $result";
?>
</body>
</html>