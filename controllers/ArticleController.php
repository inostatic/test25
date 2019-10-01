<?php

include_once ROOT.'/models/Article.php';


class ArticleController {
       
    
    public function methodSingle($id) {
        $articleItem = Article::getArticleItemById($id);
        include_once ROOT.'/views/Single.php';
//        echo '<pre>';
//        print_r($articleItem);
//        echo '</pre>';
    }
    
    
     public function methodIndex() {
        $articleList = Article::getArticleList();
//        echo '<pre>';
//        print_r($articleList);
//        echo '</pre>';
        include_once ROOT.'/views/index.php';
    }
}
