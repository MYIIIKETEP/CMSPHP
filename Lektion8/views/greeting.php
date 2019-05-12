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
<?php echo "Du är inloggad som: {$_SESSION['UserName']} <a href='?action=logout'>Logout</a>";
header("Location :: index.php");

//Done
$query = "SELECT * FROM `entries` WHERE userID =  {$_SESSION['UserID']}";
if(isset($_GET['orderby'])){
$query .= " ORDER BY {$_GET['orderby']}";
}
$statement = $pdo->prepare($query); 
$statement->execute();


if(isset($_GET['Delete'])){
    $query = " DELETE FROM `entries` WHERE `entryID`=  {$_GET['Delete']}" ;
    var_dump($_GET["Delete"]);
    $statement = $pdo->prepare($query); 
    $statement->execute();
    echo "Deleted! Back to list <a href=index.php>Index</a>";
};

?>
<table>
<thead>
<th><a href="?orderby=title">Title</th>
<th><a href="?orderby=createdAt">CreatedAt</th>
<th>Edit</th>
<th>Delete</th>
<th><a href="add.php">Add</a>
</thead>
<tbody>

<?php
//Done
 foreach ($statement as $row) {
?>  
    <tr>
    <td><?= $row['title'] ?></a></td>
    <td><?= $row['createdAt'] ?></td>
    <td><a href="updatenote.php?id=<?= $row['entryID'] ?>&userID=<?= $row['userID'] ?>">Edit</a></td>
    <td><a href="?Delete=<?=$row['entryID']?>">Delete</a>
    </tr>
 <?php }?>
</tbody>

</table>
</body>
</html>









