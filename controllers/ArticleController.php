<?php

include_once ROOT . '/models/Article.php';

class ArticleController {

    public function methodSingle($id) {
        $userSetting['id'] = $id;
        if (isset($_SESSION['session_username'])) {
            if (isset($_POST['submit'])) {
                if (!empty($_POST['comment'])) {

                    $userSetting['comment'] = htmlspecialchars($_POST['comment']);
                    $userSetting['author_id'] = $_SESSION['session_username']['id'];
                    $userSetting['author_name'] = $_SESSION['session_username']['username'];
                } else {
                    $messege = "Ошибка, заполните все поля!";
                }
            }
        }
        $articleArrResult = Article::getArticleItemById($userSetting);
        $articleItem = $articleArrResult[0];

        $tagList = Article::getArticleTag($articleItem, $flag = true);
        if (isset($articleArrResult[1])) {
            $articleComments = $articleArrResult[1];
        } else {
            $articleComments = "";
        }
        include_once ROOT . '/views/Single.php';
    }

    public function methodIndex($pageNum = 1) {
        list($articleList, $resultCount) = Article::getArticleList($pageNum);
        $tagList = Article::getArticleTag($articleList, $flag = false);
        include_once ROOT . '/views/index.php';
    }

    public static function methodBytag($id, $pageNum = 1) {
        list($articleArr, $tagsArr, $resultCount) = Article::getArticleListByTag($id, $pageNum = 1);
        include_once ROOT . '/views/indexByTag.php';
    }
    
    public static function methodAddlike($id_article, $inf) {
        include_once ROOT . '/models/Rating.php';
        $id_user = USER_ID;
        $header = Rating::get_like_info($id_user, $id_article, $inf);
        header('Location: '.$header);
        
    }
}
