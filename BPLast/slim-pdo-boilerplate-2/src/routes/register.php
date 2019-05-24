<?php
// (password_verify(
  return function ($app) {
    // Add a register
    $app->post('/api/user/reg', function ($request, $response) {
      $data = $request->getParsedBody();
      $data2 = json_encode($data);
      $data3 = json_decode($data2,true);
      if ($data3["username"]&&$data3["password"]){
      $reg= new Register($this->db);
      $userInfo = $response->withJson($reg->regUser($data3["username"],$data3["password"]));
      return $response->withJson("RegisterSuccesful");
      }
      else {
        $respone->withCode(401);
      }
      }
      );
       
   
    
  };

