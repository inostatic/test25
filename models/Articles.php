<?php

class Articles {

    public static function getArticles($id) {
        $articleList = Db::get_results('SELECT title, date, id '
                        . 'FROM article WHERE author_id = ' . $id
                        . ' ORDER BY date DESC '
                        . 'LIMIT 20');
        return $articleList;
    }

}
