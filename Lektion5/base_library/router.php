<?php
  require('views.php');
  require('models.php');

  switch($page) {
    case 'home':
      HomeView::render();
      break;

    case 'book':
      $data = [
        new BookModel('The Alchemist', 'Paulo Coelho', 'Adventure', 163),
        new BookModel('The Da Vinci Code', 'Dan Brown', 'Mystery', 689),
        new BookModel('Twilight', 'Stephenie Meyer', 'Romance', 498),
      ];
      BookView::render($data);
      break;
  }

?>