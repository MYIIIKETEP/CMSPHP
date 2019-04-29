<?php
  abstract class BaseLibraryModel
  {
    public $title;
    public $genre;
  }

  class BookModel extends BaseLibraryModel
  {
    public $author;
    public $pageCount;

    public function __construct($title, $author, $genre, $pageCount) {
      $this->title = $title;
      $this->author = $author;
      $this->genre = $genre;
      $this->pageCount = $pageCount;
    }
  }

?>