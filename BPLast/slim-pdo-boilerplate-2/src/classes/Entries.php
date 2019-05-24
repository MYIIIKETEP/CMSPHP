<?php

class Entries extends Mapper {

    public function getAllEntryies(){
        $statement = $this->db->prepare("SELECT * FROM entries INNER JOIN users ON entries.createdBy = users.userID ORDER BY createdAt DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getEntryByID($entryID) {
        $statement = $this->db->prepare("SELECT * FROM entries WHERE entryID = :entryID");
        $statement->execute([
          ':entryID' => $entryID
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
      }

    
    public function getEntryByName($entryName) {
        $query="SELECT * FROM entries WHERE title LIKE :title ORDER BY createdAt DESC";
        $statement = $this->db->prepare($query);
        $statement->execute([
            ':title' => $entryName
          ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserEntryies(){
     $statement = $this->db->prepare("SELECT * FROM entries where createdBy = :userID ORDER BY createdAt DESC ");
     $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
     $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


    public function userAddEntry($title,$content){
        $statement = $this->db->prepare('INSERT INTO entries(title, content, createdBy,createdAt) 
        VALUES ( :title,:content,:createdBy,CURRENT_DATE)');
        $statement->execute([
            ":title" => $title,
            ":content" => $content,
            ":createdBy" => $_SESSION["userID"]
        ]);
    }


    public function updateEntry($entryID,$title,$content){
      $statement = $this->db->prepare("UPDATE entries SET title= :title, content=:content WHERE entryID = :entryID");
      $statement->execute([
        ":title" => $title,
        ":content" => $content,
        ":entryID" => $entryID
    ]);
    }

    public function deleteEntry($entryID){
        $statement = $this->db->prepare("DELETE FROM `entries` WHERE entryID = :entryID");
        $statement->execute([
            ":entryID" => $entryID
        ]);
    }
};


   





?>