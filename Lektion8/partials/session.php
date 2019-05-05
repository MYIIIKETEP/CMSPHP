<?php
//Проверяем на наличие сессии(логина) Если таковой не существует, заупскаем 
//Создает cookie для сервера
if(session_status() == PHP_SESSION_NONE){
    session_start();

}




?>