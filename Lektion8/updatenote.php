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
if(isset($_SESSION["loggedIn"])){
echo "Back to main: <a href='index.php'>Main</a><br>";

if(count($_POST)==2 && isset($_GET['id'])) {
$query = "UPDATE `entries` SET `title`= ?,`content`= ? WHERE `entryID` = {$_GET['id']}";
$statement = $pdo ->prepare($query);
$statement->execute([
    $_POST['title'],
    $_POST['content']
]);

};
if(isset($_GET['id'])) {
    $statement = $pdo->prepare("SELECT * FROM entries WHERE entryID = ?");
    $statement->execute([$_GET["id"]]);
    $entry= $statement->fetch(PDO::FETCH_ASSOC);
};

var_dump ($entry);
?>
<form method="POST">
<label for=title>Title</label>
<input type="text" name="title" id="title" value ="<?= $entry['title'] ?>"/>
<br>
<label for=Content>Content</label>
<br>
<textarea name="content" id="content" rows="4" cols="50"><?= $entry['content']?></textarea>

<br>
<input type="submit" value="Save" />
</form>
<?php
echo "NiceSubmit back to <a href=index.php>Main</a>";
}
else {
    echo "<p>You are not inlogged - go to <a href=index.php>Main</a>";
};
?>


















</body>
</html>