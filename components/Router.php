<?php

session_start();

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    private function checkAuth() {
        if (!isset($_SESSION['session_username'])) {
                       $auth['enterned'] = 'form/formLogin.php';
                       $auth['comment'] = 'form/noComment.php';
                    } else {
                        $auth['enterned'] = 'form/formEntered.php';
                        $auth['comment'] = 'form/formComment.php';
                    }
                    return $auth;
    }

    public function run() {
        //Запуск функции проверка авторизации
        $checkAuth = $this->checkAuth();
        //Получить строку запроса
        $uri = $this->getURI();
        //Проверить наличие такого запроса
        foreach ($this->routes as $uriPattern => $path) {
            //Если такой ключ соответствует переданным параметрам в адресной строке
            if (preg_match("#^$uriPattern$#", $uri)) {
                //Тогда заменяем этот ключ на его значение в адресной строке,
                // результат записываем в новую переменную
                $interalRoute = preg_replace("#^$uriPattern$#", $path, $uri);
                // разбиваем эту переменную в массив по разделителю 
                $segments = explode("/", $interalRoute);
                //определим какой контроллер и метод нам нужен
                $controllerName = ucfirst(array_shift($segments)) . "Controller";
                $methodName = 'method' . ucfirst(array_shift($segments));
                //Последний элемент массива(если он существует)
                // является индексом нужной статьи
                $params = $segments;
                $params[] = $checkAuth;
                //Узнаем путь к файлу с нужным контроллером
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                //если такой файл такому пути существует
                //подключаем его
                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }
                //Создаем объект, вызываем метод
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $methodName), $params);
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
