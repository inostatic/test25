<?php
//Вывод ошибок
ini_set('display_errors', 'on');	
error_reporting(E_ALL);

//Подключаем роутер
define('ROOT', dirname(__FILE__));
define('URL', 'http://'.$_SERVER['HTTP_HOST']);
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/db.php');

//Вызываем нужный метод 
$router = new Router();
$router->run();

