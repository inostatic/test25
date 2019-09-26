<?php
//Вывод ошибок
ini_set('display_errors', 'on');	
error_reporting(E_ALL);

//Подключаем роутер
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');

//Вызываем нужный метод 
$router = new Router();
$router->run();