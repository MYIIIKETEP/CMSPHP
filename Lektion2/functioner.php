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
    //Vanlig function
    function foo(){
        echo "Foo!";
      }
    //   foo(); // Foo!
      //Anonym function
      $add_numbers = function($first_number, $second_number){
        return $first_number + $second_number;
      };
    //   echo $add_numbers(10, 10); // 20




    $sum_all_values = 10;
    // Нельзя просто так заюзать глобальну переменную
    //чтобы это сделать нужно сделать GLOBAL
    function add_numbers($first_number , $second_number){
      global $sum_all_values;
      $sum_all_values += $first_number + $second_number;
      return $first_number  + $second_number;
    }
    // add_numbers(10, 10);
    // echo $sum_all_values; // 10

     ?>
</body>
</html>