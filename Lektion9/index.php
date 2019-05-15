<?php
  // Load everything needed
  require __DIR__ . '/../vendor/autoload.php';
  // Start a session here
  session_start();
  // Get settings and instantiate the app
  $settings = require __DIR__ . '/../src/settings.php';
  $app = new \Slim\App($settings);
  // Register our dependencies through our container
  $dependencies = require __DIR__ . '/../src/container.php';
  $dependencies($app);
  // Start adding routes
  $app->get('/user/{id}', function ($request, $response, $args) {
    $userID = $args['id'];
    $statement = $this->db->prepare("SELECT * FROM animals WHERE id = :userID");
    $statement->execute([
      ':userID' => $userID
    ]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $response->withJson($user);
  });
  // Run app
  $app->run();