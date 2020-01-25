<?php

class RedactorController {

    public function methodArticles($checkAuth) {
        self::authSession();
        include_once ROOT . '/models/Articles.php';
        $id = $_SESSION['session_username']['id'];
        $articleList = Articles::getArticles($id, $checkAuth);
        include_once ROOT . '/views/ArticlesTable.php';
    }

    public function methodAdd($checkAuth) {
        
        self::authSession();
        include_once ROOT . '/models/Add.php';
        if (isset($_POST['add'])) {
            if (!empty($_POST['title']) and ( !empty($_POST['content']))) {
                $params = [];
                $params['title'] = htmlspecialchars($_POST['title']);
                $params['content'] = htmlspecialchars($_POST['content']);
                $params['author_id'] = $_SESSION['session_username']['id'];
                $params['author_name'] = $_SESSION['session_username']['username'];
                $params['short_content'] = mb_substr($params['content'], 0, 453, 'UTF-8');
                Add::addArticle($params, $checkAuth);
                header('Location: '.URL.'/myarticles');
            }
        }
        include_once ROOT . '/views/AddArticle.php';
    }

    
    
    
    public function methodDelete($id, $checkAuth) {
        self::authSession();
        include_once ROOT . '/models/Delete.php';
        if(Delete::deleteArticle($id)) {
            header('Location: '.URL.'/myarticles');
        }
    }

    public function methodChange($id, $checkAuth) {

        self::authSession();
        $id *= 1;
        if (is_int($id)) {
            $params['id'] = $id;
            include_once ROOT . '/models/Change.php';
            if (isset($_POST['add'])) {
                if (!empty($_POST['title']) and ! empty($_POST['content'])) {
                    $params['title'] = $_POST['title'];
                    $params['content'] = $_POST['content'];
                    $params['short_content'] = mb_substr($params['content'], 0, 453, 'UTF-8');
                    if (Change::saveArticle($params)) {
                        header('Location: ' . URL . '/myarticles');
                        exit();
                    }
                }
            }
            $article = Change::changeArticle($id, $checkAuth);
            include_once ROOT . '/views/ChangeArticle.php';
        }
    }

    private static function authSession() {
        if (!isset($_SESSION['session_username'])) {
            header('Location: ' . URL);
            exit();
        } else {
            return true;
        }
    }

}
