<?php
class Animal {
  public function sleep()
  {
    echo "zZzZz!";
  }
  public function eat()
  {
    echo "Nom nom!";
  }
}

class Cat extends Animal
{
  public function makeNoise() {
     echo 'meow';
  }
}
  
class Dog extends Animal {
  public function makeNoise() {
     echo 'woffy woffy noisy makey';
  }
}
$a_cat = new Cat();
$a_cat->sleep();
$a_cat->eat();
$a_cat->makeNoise();

$a_dog = new Dog();
$a_dog->eat();
$a_dog->makeNoise();
//Когда мы делаем екстенд - Мы берём то что уже есть у класса и мы можем его дополнить
//Реальные Использование?
?>