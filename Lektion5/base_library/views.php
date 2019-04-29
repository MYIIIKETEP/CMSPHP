<?php
  class BaseView
  {
    public static function render($body) {
      $output = '';
      $output .= '<table class="table table-striped table-hover">';
      $output .= '<tbody>';
      $output .= $body;
      $output .= '</tbody>';
      $output .= '</table>';
      return $output;
    }
  }
  //Продлжаем выписку
  class BookView extends BaseView
  {
    public static function render($books) {
      $body = '';
      foreach ($books as $book) {
        $body .= '<tr>';
        $body .= '<td>' . $book->title . '</td>';
        $body .= '<td>' . $book->author . '</td>';
        $body .= '<td>' . $book->genre . '</td>';
        $body .= '<td>' . $book->pageCount . '</td>';
        $body .= '</tr>';
      }

      echo parent::render($body);
    }
  }

  class HomeView
  {
    public static function render() {
      echo '<p>Welcome to the library! Please look around for something to borrow!</p>';
    }
  }

?>