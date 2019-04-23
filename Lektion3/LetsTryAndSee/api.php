<?php

  //Пост то что мы получаем откуда либо, сервер, страница, похуй
  //Отсюда уже из ФОРМЫ так как мы показали это в FETCH
  if(isset($_GET["login"])){
  if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == 'jonas' && $_POST['password'] == 'pass') 
    {
      //eftersom "return i JS måste komma tillbacka i JSON , då echoar vi tillbacka JSON
      echo json_encode([ "lol"=>"lol" ]);
    } else {
      http_response_code(403);
    }
  }
}
  if (isset($_GET['message'])) {
    $messages = [
      'Remember to feed the cat!',
      'I am a prince but have nowhere to place my millions of dollars',
      'Disney is interested in buying your company'
    ];
    echo json_encode(['messages' => $messages]);
  }
?>