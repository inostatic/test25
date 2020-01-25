<?php
include_once ROOT . '/models/Article.php';
class ArticleController {

    public function methodSingle($id, $checkAuth) {
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
        $articleArrResult = Article::getArticleItemById($userSetting, $checkAuth);
        $articleItem = $articleArrResult[0];
        if (isset($articleArrResult[1])) {
            $articleComments = $articleArrResult[1];
        } else {
            $articleComments = "";
        }

        include_once ROOT . '/views/Single.php';
    }

    public function methodIndex($pageNum = 1, $checkAuth) {
        $resultEnd = Article::getArticleList($pageNum, $checkAuth);
        $articleList = $resultEnd['0'];
        $resultCount = $resultEnd['1'];
        $checkAuth = $resultEnd['2'];
        include_once ROOT . '/views/index.php';
    }

}
