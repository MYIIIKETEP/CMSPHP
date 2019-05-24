<?php

class Login extends Mapper {

    public function LoginUser($userName,$password){
        $statement = $this->db->prepare("SELECT * FROM users WHERE username = :username ");
        $statement->execute([
          ':username' => $userName
        ]);
       
       $user= $statement->fetch(PDO::FETCH_ASSOC);
       if(password_verify($password,$user["password"])){
        //SET ALL NEEDED IF PASSWORD OK
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['UName'] = $user["username"];
        $_SESSION["loggedIn"] = true;
        return $user;
       }
      
   
    
    }

};
