<?php

class RedactorController {

    public function methodArticles() {
        include_once ROOT . '/models/Articles.php';
       $articleList = Articles::getArticles();
       include_once ROOT . '/views/ArticlesTable.php';
    }
    
    public function methodAdd() {
        include_once ROOT . '/models/Add.php';
        Add::addArticle();        
        include_once ROOT . '/views/AddArticle.php';
    }
    
    public function methodDelete($id) {
        include_once ROOT . '/models/Delete.php';
        Delete::deleteArticle($id);
    }
    public function methodChange($id) {
        include_once ROOT . '/models/Change.php';
        $article = Change::changeArticle($id);
        include_once ROOT . '/views/ChangeArticle.php';
    }
}
