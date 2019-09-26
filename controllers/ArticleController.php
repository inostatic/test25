<?php

include_once ROOT.'/models/Article.php';


class ArticleController {
       
    
    public function methodConcrete($id) {
        $articleItem = Article::getArticleItemById($id);
        
        echo '<pre>';
        print_r($articleItem);
        echo '</pre>';
    }
    
    
     public function methodIndex() {
        $articleList = Article::getArticleList();
    }
}
