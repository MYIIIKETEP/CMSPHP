<?php

return function ($app) {
  // Register auth middleware
  $auth = require __DIR__ . '/../middlewares/auth.php';


  //get all Users
  $app->get('/api/user', function ($request,$response){
    $user = new User($this->db); //new *** Måste vara namnet på skapade KLASS
    return $response->withJson($user->getAllUsers());
  });


  // Get User/byID
  $app->get('/api/user/{id}', function ($request, $response, $args) {
    $userID = $args['id'];
    $user = new User($this->db);
    return $response->withJson($user->getUserByID($userID));
  });
  
  $app->get('/api/logout', function ($request, $response) {
    unset($_SESSION["loggedIn"]);
    session_destroy();
    return $response->withJson("Lolz");
  });
};

