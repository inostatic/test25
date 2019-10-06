<?php

include_once ROOT . '/models/Article.php';

class ArticleController {

    public function methodSingle($id) {
        $articleItem = Article::getArticleItemById($id);
        include_once ROOT . '/views/Single.php';
    }

    public function methodIndex() {
        $articleList = Article::getArticleList();

        include_once ROOT . '/views/index.php';
    }

}
