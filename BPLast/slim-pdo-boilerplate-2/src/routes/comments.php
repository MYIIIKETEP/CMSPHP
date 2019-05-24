<?php
return function ($app) {
    // Register auth middleware
    $auth = require __DIR__ . '/../middlewares/auth.php';
    
    $app->get('/api/comments', function ($request,$response){
    $commentDB = new Comments($this->db); 
    return $response->withJson($commentDB->getAllComments());
    
    });
    
    
    $app->get('/api/scomment/{id}', function($request,$response,$args){
        $comID=$args["id"];
        $singleCom = new Comments($this->db);
        return $response->withJson($singleCom->getCommentByID($comID));
    });


    $app->get('/api/comments/{id}', function ($request, $response, $args) {
    $entryID = $args["id"];
    $commentDB = new Comments($this->db);
    return $response->withJson($commentDB->getEntryComments($entryID));
    });



    $app->POST('/api/comment/post',function($request,$response){
        $data = $request->getParsedBody();
        $newComment = new Comments($this->db);
        if($data["content"]){
        return $response->withJson($newComment->addComment($data["entryID"],$data["content"]));
        }
        else{
            $response-withCode(401);
        }
    });
    $app->POST('/api/comment/edit',function($request,$response){
        $data = $request->getParsedBody();
        $newComment = new Comments($this->db);
        if($data["content"]){
        return $response->withJson($newComment->uppComment($data["commentID"],$data["content"]));
        }
        else{
            $response-withCode(401);
        }

    
    });
    $app->delete('/api/dcomment/{id}', function($request,$response,$args){
        $commentID = $args["id"];
        $dCm = new Comments($this->db);
        return $response->withJson($dCm->deleteComment($commentID));
    });  


    // ->add($auth)
































};


