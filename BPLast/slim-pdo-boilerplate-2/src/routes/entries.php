<?php
return function ($app) {
    // Register auth middleware
    $auth = require __DIR__ . '/../middlewares/auth.php';
 $app->get('/api/entries', function ($request,$response){
    $entries = new Entries($this->db); //new *** Måste vara namnet på skapade KLASS
    return $response->withJson($entries->getAllEntryies());



  });
  $app->get('/api/entries/{id}', function ($request, $response, $args) {
    $entryID = $args['id'];
    $entry = new Entries($this->db);
    return $response->withJson($entry->getEntryByID($entryID));
  })->add($auth);

  $app->get('/api/entry/find/{name}', function($request,$response,$args){
    $nameLike = $args['name'];
    // $nameLike +="%";
    $findE = new Entries($this->db);
    return $response->withJson($findE->getEntryByName($nameLike));    
    });
    
  
  
    $app->post('/api/entry/add', function ($request, $response) {
      $data = $request->getParsedBody();
      $newEntry= new Entries($this->db);
      if($data["title"] && $data["content"]){
        $userInfo = $response->withJson($newEntry->userAddEntry($data["title"],$data["content"]));
        return $response->withJSON("Succesfull");
      }
    else{
        return $response-withCode(401);
    }
      }
      )->add($auth);
    //   ,$data["userID"]

    $app->get('/api/entry/mine',function($request,$response){
    $userEntr = new Entries($this->db);
    return $response->withJson($userEntr->getUserEntryies());
    });
    


    $app->POST('/api/entry/update/{id}',function($request,$response,$args){
    $data = $request->getParsedBody();
    $entryID=$args["id"];
    $uEnt = new Entries($this->db);
    if($data["title"]&&$data["content"]){
     return $response->withJson($uEnt->updateEntry($entryID,$data["title"],$data["content"]));
    }
    else{
        return $response-withCode(401);
    };
    
    })->add($auth);
    


    $app->delete('/api/entry/delete/{id}', function($request,$response,$args){
        $entryID = $args["id"];
        $delEn = new Entries($this->db);
        return $response->withJson($delEn->deleteEntry($entryID));
    })->add($auth);
   
    
  


};