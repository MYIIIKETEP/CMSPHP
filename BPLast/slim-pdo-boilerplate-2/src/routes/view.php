<?php

return function ($app) {
  // Add a basic template route
  $lol;  
  $app->get('/', function ($request, $response, $args) {
    
    if (isset($_SESSION["loggedIn"])) {
    $templateName = '#inloggedAllEntryes';
    }
    else {
    $templateName = '#loginFormTemplate';
    };
    return $this->renderer->render($response, 'index.phtml', [
      'title' => 'REDDIT v2',
      'templateName' => $templateName
    ]);
    
  });
  


  
};
