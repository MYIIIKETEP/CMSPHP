<?php
require "partials/dbcon.php";
require "partials/dbcon.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php echo "Du är inloggad som: {$_SESSION['UserName']} <a href='?action=logout'>Logout</a>";
header("Location :: index.php");


$query = "SELECT * FROM `entries` WHERE userID =  {$_SESSION['UserID']}";
if(isset($_GET['orderby'])){
$query = " ORDER BY {$_GET['orderby']}";
};
$statement = $pdo->prepare($query); 
$statement->execute();
?>
<table>
<thead>
<th><a href="?orderby=title">Title</th>
<th><a href="?orderby=title">CreatedAt</th>
<th>Edit</th>
</thead>
<tbody>
<?php
 foreach ($statement as $row) {
?>
    <td><?= $row['title'] ?></a></td>
    <td><?= $row['createdAt'] ?></td>
 <?php }?>
</tbody>

</table>
</body>
</html>









