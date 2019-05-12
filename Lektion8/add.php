<?php
require "partials/dbcon.php";
require "partials/session.php";

?>






<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    if(count($_POST) == 2) {
    $query = "INSERT INTO `entries`(`title`, `content`, `userID`) VALUES (?,?, {$_SESSION["UserID"]})";
    $statement = $pdo->prepare($query);
    $statement->execute([
     $_POST["title"],
     $_POST["content"]
    ]);
    echo "Added new Entry, back to <a href='index.php'>Main</a>";
    }




    ?>
    <form method="POST">
    <label for="model">Title</label>
    <input type="text" name="title" id="content" value="" />
    <br />
    <label for="speed">Content</label>
    <br>
    <textarea name="content" id="content" rows="4" cols="50"></textarea>
    <br />
    <input type="submit" value="Save" />
  </form>
</body>
</html>