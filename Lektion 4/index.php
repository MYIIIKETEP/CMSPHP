<?php
class Book {
  public $title;
  public $author;
   //Используеться для того чтобы при создании нового объекта , такого-же типа, нам не приходилось делать много команд о новых параметрах
   //Когда запрос можно сделать супер простым
  public function __construct($title, $author) {
    $this->title = $title;
    $this->author = $author;
  }
  public function printInfo() {
    echo "Titel: $this->title \nFörfattare: $this->author";
  }
  //Функция для смены данных - далее будет работать в новом элементе
  public function Edit($title, $author){
    $this->title = $title;
    $this->author = $author;
  }
}
//Создаем инстанцию нового елемента из класса, Параметры задаем сразу черезе конструктор
$first_book = new Book('Brott och Straff', 'Fjodor Dostojevskij');
$first_book->printInfo();
$first_book->Edit("Magma ", "Power");
$first_book->printInfo();