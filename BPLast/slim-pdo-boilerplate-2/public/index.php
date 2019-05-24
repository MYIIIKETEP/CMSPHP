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

  //comments
  $comments = require __DIR__ .'/../src/routes/comments.php';
  $comments($app);
  //entry
  $entr = require __DIR__ .'/../src/routes/entries.php';
  $entr($app);
  //reg
  $regist = require __DIR__ . '/../src/routes/register.php';
  $regist($app);
  // login
  $login = require __DIR__ . '/../src/routes/login.php';
  $login($app);
  //views
  $view = require __DIR__ . '/../src/routes/view.php';
  $view($app);
  //user
  $user = require __DIR__ . '/../src/routes/user.php';
  $user($app);

  // Run app
  $app->run();
