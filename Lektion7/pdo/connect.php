<?php
  $host = 'localhost';
  $db   = 'TheStore';
  $user = 'root';
  $pass = '';
  $charset = 'utf8';
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $pdo = new PDO($dsn, $user, $pass);
?>