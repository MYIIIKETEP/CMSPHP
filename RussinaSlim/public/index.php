<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require '../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require 'src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require 'src/dependencies.php';
$dependencies($app);

// Register middleware
$middleware = require 'src/middleware.php';
$middleware($app);

// Register routes
$routes = require 'src/routes.php';
$routes($app);

// Run app
$app->run();
