<?php

class RedactorController {

    public function methodArticles($checkAuth) {
        include_once ROOT . '/models/Articles.php';
       $articleList = Articles::getArticles($checkAuth);
       include_once ROOT . '/views/ArticlesTable.php';
    }
    
    public function methodAdd($checkAuth) {
        include_once ROOT . '/models/Add.php';
        Add::addArticle($checkAuth);        
        include_once ROOT . '/views/AddArticle.php';
    }
    
    public function methodDelete($id, $checkAuth) {
        include_once ROOT . '/models/Delete.php';
        Delete::deleteArticle($id);
    }
    public function methodChange($id, $checkAuth) {
        include_once ROOT . '/models/Change.php';
        $article = Change::changeArticle($id, $checkAuth);
        include_once ROOT . '/views/ChangeArticle.php';
    }
}
