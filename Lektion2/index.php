<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
//Изменить тип переменной
//Называеться Casting of Datatypes
//(int), (integer) - cast to integer
// (bool), (boolean) - cast to boolean
// (float), (double), (real) - cast to float
// (string) - cast to string
// (array) - cast to array
// (object) - cast to object
// (unset) cast to NULL

    $momey ="30";
    //Проверить gettype - Возвращает строчку какой тип у переменной
    //isset - true or false если там есть что-то в нем
    //Пхп изменяет переменные как хочет, в разные стороны, они очень флексибельны
    $foo = "1";  // $foo is string (ASCII 49)
    $foo *= 2;   // $foo is now an integer (2)
    $foo = $foo * 1.3;  // $foo is now a float (2.6)
    //Так как тут есть знак умножит пхп ищет цифры чтобы их умножить игнорируя текст
    $foo = 5 * "10 Little Piggies"; // $foo is integer (50)
    $foo = 5 * "10 Small Pigs";     // $foo is integer (50)
    $bar = "Bar"; // $bar is string
    //Если пыататься переделать стринг с текстом в инт и там не будет цифр , он просто передалет
    //его в 0
    $bar = (int)$bar; // $bar is now an integer (0)

    ?>
</body>
</html>