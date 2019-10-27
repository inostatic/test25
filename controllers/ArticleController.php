<?php

include_once ROOT . '/models/Article.php';

class ArticleController {

    public function methodSingle($id) {
        $articleArrResult = Article::getArticleItemById($id);
        $articleItem = $articleArrResult[0];
        if(isset($articleArrResult[1])) {
        $articleComments = $articleArrResult[1];
        } else {
            $articleComments = "";
        }
        include_once ROOT . '/views/Single.php';
    }

    public function methodIndex($pageNum = 1) {
        $resultEnd = Article::getArticleList($pageNum);
        $articleList = $resultEnd['0'];
        $resultCount = $resultEnd['1'];
        include_once ROOT . '/views/index.php';
    }

}
