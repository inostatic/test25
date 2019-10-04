<?php

class RedactorController {

    public function methodArticles() {
        include_once ROOT . '/models/Articles.php';
       $articleList = Articles::getArticles();
       include_once ROOT . '/views/ArticlesView.php';
    }

}
