<?php require 'connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Product</title>
</head>
<body>
  <?php
    if(count($_POST) == 5 && isset($_GET['model']) && isset($_GET['type'])) {
      $rd_screen = "rd";
      if ($_GET['type'] == 'laptop') {
        $rd_screen = "screen";
      }
      $query = "UPDATE {$_GET['type']}";
      $query .= " SET speed = ?, ram = ?, hd = ?, {$rd_screen} = ?, price = ?";
      $query .= " WHERE model = ?";
      $statement = $pdo->prepare($query); 
      $statement->execute([
        $_POST['speed'],
        $_POST['ram'],
        $_POST['hd'],
        $_POST['rd_screen'],
        $_POST['price'],
        $_GET['model']
      ]); 
      echo "Updated {$_GET['model']} in the database.";
    }
    if (isset($_GET['model']) && isset($_GET['type'])) {
      $statement = $pdo->prepare("SELECT * FROM {$_GET['type']} WHERE model = ?"); // Prepare any SQL Query
      $statement->execute([$_GET['model']]); // Run the query
      $product = $statement->fetch(PDO::FETCH_ASSOC); //
  ?>
  <form method="POST">
    <label for="model">Model</label>
    <input type="text" name="model" id="model" value="<?= $product['model'] ?>" disabled="true" />
    <br />
    <label for="speed">Speed</label>
    <input type="text" name="speed" id="speed" value="<?= $product['speed'] ?>" />
    <br />
    <label for="ram">Ram</label>
    <input type="text" name="ram" id="ram" value="<?= $product['ram'] ?>" />
    <br />
    <label for="hd">HD</label>
    <input type="text" name="hd" id="hd" value="<?= $product['hd'] ?>" />
    <br />
    <label for="rd_screen">RD / Screen</label>
    <input type="text" name="rd_screen" id="rd_screen" value="<?php
      if ($_GET['type'] == 'pc') {
        echo $product['rd'];
      } else {
        echo $product['screen'];
      }
    ?>" />
    <br />
    <label for="price">Price</label>
    <input type="text" name="price" id="price" value="<?= $product['price'] ?>" />
    <br />
    <input type="submit" value="Save" />
  </form>
  <?php
    } else {
      echo '<p>You have not selected an existing product</p>';
    }
  ?>
  
</body>
</html>