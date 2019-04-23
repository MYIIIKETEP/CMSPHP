<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="form.php" method="POST">
    <!-- ALL INPUTS MUST HAVE A NAME TO BE STORED -->
    <p>Name:</p><input type="text" name="username" />
    <p>Fav:</p><input type="text" name="favIc">
    <p>PW:</p><input type="password" name="passW">
    <p>bd</p><input type="date" name="bdate">
    <input type="submit" value="Skicka" />
</form>

<?php
$birthday = strtotime("April 15 2014");
$now = strtotime('now');
var_dump($birthday . " " . $now("Y"));
?>
</body>
</html>
