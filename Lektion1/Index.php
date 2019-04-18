<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Vanlig all php skrivs i taggen efter komando ";" req-->
    <!-- echo = skriv ut det här -->
    <!-- <?php 
    //Создание переменных
    $name = "Denis";
    //if-else funkar likadant

    ?>
    <?php
    //   $message = "Hello World";
    //   for($i = 0; $i < 10; $i = $i + 1){
    //       //При использовании "" можно комбинировать разные штуки , текст, пхп, хтмл
    //     echo "SomeText: $message $i <br />";
    //   }
    ?> -->
   <?php
   //1.1
   $name = "Denis";
   $lastname="Jakusjev";
   $year=23;
   echo "<p>Programming</p>";
   echo "<div style='background-color:lightcoral; height:200px; width:200px'></div>";
   echo "<h1> $name $lastname </h1>";
   echo "I've seen things you people wouldn't believe.<br>
    Attack ships on fire off the shoulder of Orion.<br>
     I watched C-beams glitter in the dark near the Tannhauser gate.<br>
      All those moments will be lost in time... <br>like tears in rain...<br> Time to die.<br>";
   $year = $year * 7 ;
   echo "$year";

   ?>
    

</body>
</html>