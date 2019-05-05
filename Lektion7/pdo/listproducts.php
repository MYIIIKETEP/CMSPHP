<?php require 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Products</title>
</head>
<body>
  <?php
    $query = 'SELECT product.maker, product.type, pc.model, pc.speed, pc.ram, pc.price FROM pc';
    $query .= ' INNER JOIN product ON pc.model = product.model';
    $query .= ' UNION';
    $query .= ' SELECT product.maker, product.type, laptop.model, laptop.speed, laptop.ram, laptop.price FROM laptop';
    $query .= ' INNER JOIN product ON laptop.model = product.model';
    if (isset($_GET['orderby'])) {
      $query .= " ORDER BY {$_GET['orderby']}";
    }
    $statement = $pdo->prepare($query); 
    $statement->execute(); 
  ?>
  <table>
    <thead>
      <th><a href="?orderby=maker">Maker</a></th>
      <th><a href="?orderby=type">Type</a></th>
      <th><a href="?orderby=model">Model</a></th>
      <th><a href="?orderby=speed">Speed</a></th>
      <th><a href="?orderby=ram">Ram</a></th>
      <th><a href="?orderby=price">Price</a></th>
      <th>Edit</th>
    </thead>
    <tbody>
    <?php
      foreach ($statement as $row) {
    ?>
      <tr>
        <td><?= $row['maker'] ?></a></td>
        <td><?= $row['type'] ?></td>
        <td><?= $row['model'] ?></td>
        <td><?= $row['speed'] ?></td>
        <td><?= $row['ram'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><a href="updateproduct.php?model=<?= $row['model'] ?>&type=<?= $row['type'] ?>">Edit</a></td>
      </tr>
    <?php
      }
    ?>
    </tbody>
  </table>
  <button><a href="addproduct.php">GoTo</button>
</body>
</html>