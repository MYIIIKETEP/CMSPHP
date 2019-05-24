<?php
// (password_verify(
  return function ($app) {
    // Register auth middleware
    $auth = require __DIR__ . '/../middlewares/auth.php';
    // Add a login route
    $app->post('/api/loginuser', function ($request, $response) {
      $data = $request->getParsedBody();
      $data2 = json_encode($data);
      $data3 = json_decode($data2,true);
      if($data3["username"]&&$data3["password"]){
      $login= new Login($this->db);
      $userInfo = $response->withJson($login->LoginUser($data3["username"],$data3["password"]));
      return $userInfo;
      }
     
      });
       
   
    // Add a ping route
    $app->get('/api/ping', function ($request, $response, $args) {
      return $response->withJson(['loggedIn' => true]);
    })->add($auth);
  };

