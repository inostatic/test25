<?php
include_once ROOT . '/models/Article.php';
class ArticleController {

    public function methodSingle($id, $checkAuth) {
        $articleArrResult = Article::getArticleItemById($id, $checkAuth);
        $articleItem = $articleArrResult[0];
        if(isset($articleArrResult[1])) {
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
