<?php

include_once ROOT.'/models/Article.php';


class ArticleController {
       
    
    public function methodSingle($id) {
        $articleItem = Article::getArticleItemById($id);
        
        echo '<pre>';
        print_r($articleItem);
        echo '</pre>';
    }
    
    
     public function methodIndex() {
        $articleList = Article::getArticleList();
        echo '<pre>';
        print_r($articleList);
        echo '</pre>';
    }
}
