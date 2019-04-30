<?php require "dbcon.php" ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ListProducts</title>
</head>
<body>
<!-- Создаем квери чтобы выписать продукты -->
    <?php
     $query = 'SELECT product.maker, product.type, pc.model, pc.speed, pc.ram, pc.price FROM pc';
     //Точка нужна чтобы добавить квери к существуюзщему
     $query .= ' INNER JOIN product ON pc.model = product.model';
     $query .= " UNION ";
     $query .= 'SELECT product.maker, product.type, laptop.model, laptop.speed, laptop.ram, laptop.price FROM laptop';
     //Точка нужна чтобы добавить квери к существуюзщему
     $query .= ' INNER JOIN product ON laptop.model = product.model';
     

     if (isset($_GET['orderby'])) {
        $query .= " ORDER BY {$_GET['orderby']}";
      }




     //Чтобы получить результат
      //PDO летит с конекта
     $statement = $pdo->prepare($query);
     //execute живёт своей жизнью и просто существует
     $statement->execute();
     //fetchAll чтобы вытащить все
     $data = $statement->fetchAll(PDO::FETCH_ASSOC);

     //Делаем кнопки так чтобы скидывать квери нашему коду по нажатию - что дает нам возможность выполнять какую либо функцию 
     //по нажатию кнопки
?>
<table>
<tHead>
<th><a href="?orderby=maker">Maker</th>
<th><a href="?orderby=type">Type</th>
<th><a href="?orderby=model">model</th>
<th><a href="?orderby=speed">Speed</th>
<th><a href="?orderby=ram">Ram</th>
<!-- Чтобы отправить в ГЕТ после ? пишем квери -->
<th><a href="?orderby=price">Price</th>
</tHead>
<tbody>
<?php
     foreach ($data as $product) {
?>
<!--  дает возможность лехгко выписывать что угодно в этой коллекции арреев, чтобы достучаться до отдельных параметров пишем через имя -->
<tr>
<td><?= $product['maker']?></td>
<td><?= $product['type']?></td>
<td><?= $product['model']?></td>
<td><?= $product['speed']?></td>
<td><?= $product['ram']?></td>
<td><?= $product['price']?></td>






</tr>
</tbody>

<?php
     }
      

    ?>
</body>
</html>