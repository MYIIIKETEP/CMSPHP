<?php

class Comments extends Mapper {



public function getAllComments(){
    $statement = $this->db->prepare("SELECT * FROM comments");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}



public function getEntryComments($entryID) {
        $statement = $this->db->prepare("SELECT * FROM comments INNER JOIN users ON comments.createdBy = users.userID  WHERE entryID = :entryID ORDER BY createdAt DESC");
        $statement->execute(
            [
                ":entryID" => $entryID
            ]
        );
        return $statement->fetchAll(PDO::FETCH_ASSOC);
}   

public function getCommentByID($CommentID) {
        $statement= $this->db->prepare("SELECT * FROM comments WHERE commentID = :commentID");
        $statement->execute([
            ":commentID" => $CommentID
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC);
}

public function addComment($entryID,$content){
        $statement= $this->db->prepare("INSERT INTO `comments`(`entryID`, `content`, `createdBy`) VALUES (:entryID,:content,:userID)");
        $statement->execute([
            ":entryID" => $entryID,
            ":content" => $content,
            ":userID" => $_SESSION['userID']
        ]);
    
}

public function uppComment($CommentID,$content){
    $statement= $this->db->prepare("UPDATE `comments` SET content=:content WHERE commentID = :commentID");
    $statement->execute([
        ":content" => $content,
        ":commentID" => $CommentID
    ]);
}

public function deleteComment($commentID){
   $statement= $this->db->prepare("DELETE FROM comments WHERE commentID = :commentID");
   $statement->execute([
     "commentID" => $commentID
   ]);

}









};


?>