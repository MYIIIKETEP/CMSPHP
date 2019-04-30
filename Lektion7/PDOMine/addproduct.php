<?php require "dbcon.php"?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--PC model ,speed , ram, hd rd, price -->
<!-- PRODUCT Maker, model, type -->
<?php

echo count($_POST);
if(count($_POST) == 8){
    //Создаем квери и на месо переменныз пихаем вопросительные знаки
    $query = 'INSERT INTO pc  (model, speed, ram, hd, rd, price) VALUES (?,?,?,?,?,?)';
    $statemanet = $pdo->prepare($query);
    $statemanet->execute([
        //Тут вписываем остальное
        $_POST['model'],
        $_POST['speed'],
        $_POST['ram'],
        $_POST['hd'],
        $_POST['rd'],
        $_POST['price']
    ]);


    $query = 'INSERT INTO product (maker, model, type) VALUES (?, ?, ?)';
    $statemanet = $pdo->prepare($query);
    $statemanet->execute([
        $_POST['maker'],
        $_POST['model'],
        $_POST['type']
    ]);
};




?>
   <!-- Post Нужен чтобы отправить информацию куда либо -->
    <form method="POST">
    <label>Model</label>
    <input type="text" name="model">
    <br/>
    <label>Speed</label>
    <input type="text" name="speed">
    <br/>
    <label>Ram</label>
    <input type="text" name="ram">
    <br/>
    <label>HD</label>
    <input type="text" name="hd">
    <br/>
    <label>RD</label>
    <input type="text" name="rd">
    <br/>
    <label>Price</label>
    <input type="text" name="price">
    <input type="hidden" name="type" value="pc">
    <br>
    <label>Maker</label>
    <select name="maker">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <br>
    <input type="submit" value="Submit">



    </select>








    </form>
</body>
</html>