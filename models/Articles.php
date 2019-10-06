<?php

class Articles {

    public static function getArticles() {
        if (!isset($_SESSION['session_username'])) {
            header('Location: http://test25');
            exit();
        } else {
            $db = Db::getConnection();
            $id = $_SESSION['session_username']['id'];
            $articleList = [];
            $result = $db->query('SELECT title, date, id '
                    . 'FROM article WHERE author_id = ' . $id
                    . ' ORDER BY date DESC '
                    . 'LIMIT 20');

            if ($result != NULL) {
                $i = 0;
                while ($row = $result->fetch()) {

                    $articleList[$i]['title'] = $row['title'];
                    $articleList[$i]['id'] = $row['id'];

                    $i++;
                }
                return $articleList;
            }
        }
    }

}
