<?php

class Articles {

    public static function getArticles() {
        
         $db = Db::getConnection();
         $id = $_SESSION['session_username']['id'];
        $articleList = [];
        $result = $db->query('SELECT title, date '
                . 'FROM article WHERE author_id = '.$id
                . ' ORDER BY date DESC '
                . 'LIMIT 5');

        if($result != NULL) {
        $i = 0;
        while ($row = $result->fetch()) {
            
            $articleList[$i]['title'] = $row['title'];
           
            $i++;
        }
        return $articleList;
        }
    }

}
