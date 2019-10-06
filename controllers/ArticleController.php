<?php

include_once ROOT . '/models/Article.php';

class ArticleController {

    public function methodSingle($id) {
        $articleItem = Article::getArticleItemById($id);
        include_once ROOT . '/views/Single.php';
    }

    public function methodIndex($pageNum = 1) {
        $resultEnd = Article::getArticleList($pageNum);
        $articleList = $resultEnd['0'];
        $resultCount = $resultEnd['1'];
        include_once ROOT . '/views/index.php';
    }

}
