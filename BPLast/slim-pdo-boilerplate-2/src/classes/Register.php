<?php

class Register extends Mapper {

    public function regUser($userName,$password){
        $statement = $this->db->prepare(
            "INSERT INTO users (username,password)
            VALUES (:username, :password)"
        );
        $statement->execute([
            ":username" => $userName,
            //криптовка пароля
            ":password" => password_hash($password,PASSWORD_BCRYPT)
        ]);

    
    }
}