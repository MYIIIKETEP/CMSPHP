<?php
require "partials/session.php";
require "partials/dbcon.php";


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
     <!-- Для регистрации -->
     <?php
     //Регистрация с криптовкой пароля
     if(isset($_GET["action"])){
       if($_GET["action"] == "register"){
         $statement = $pdo->prepare(
             "INSERT INTO users (username,password)
             VALUES (:username, :password)"
         );
         $statement->execute([
             ":username" => $_POST["username"],
             //криптовка пароля
             ":password" => password_hash($_POST["password"],PASSWORD_BCRYPT)
         ]);

           echo "registrerad!";
       }
      if($_GET["action"] == "login"){
          $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
          $statement->execute([
              ":username" => $_POST['username']
          ]);
          $user = $statement->fetch(PDO::FETCH_ASSOC);
          if(password_verify($_POST["password"], $user["password"])){
              //Переменная для проверки "логина" которую мы создаем сами
              $_SESSION["loggedIn"] = true;
              $_SESSION["UserName"] = $user["username"];
              $_SESSION["UserID"] = $user["userID"];
          }
      }
      if($_GET["action"] == "logout") {
        unset($_SESSION["loggedIn"]);
        session_destroy();
        echo "Du har blivit utloggad";
     };
     }
     



     ?>
    <?php
     if(isset($_SESSION["loggedIn"])){
         require "views/greeting.php";
     }
    else{
        require "views/login.php";
        require "views/reg.php";
    }
     ?>









</body>
</html>