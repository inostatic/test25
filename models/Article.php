<?php

class Article {

    public static function getArticleItemById($id) {
        //Обрезаем если число не целое
        $id = intval($id);
        //Подключаем PDO параметры уже внутри
        $db = Db::getConnection();
        //Делаем выборку
        $result = $db->query('SELECT*FROM article WHERE id=' . $id);
        //Убираем повторяющиеся елементы с числовыми ключами
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $articleItem = $result->fetch();
        if ($articleItem != NULL) {
            $articleArrResult[] = $articleItem;
            $result = $db->query('SELECT*FROM comments WHERE article_id = ' . $id 
                    . ' ORDER BY date DESC');
            if ($result != NULL) {
                $articleComments = [];
                $i = 0;
                while ($row = $result->fetch()) {
                    $articleComments[$i]['author_name'] = $row['author_name'];
                    $articleComments[$i]['date'] = $row['date'];
                    $articleComments[$i]['comment'] = $row['comment'];
                    $i++;
                }
                $articleArrResult[] = $articleComments;
            }
            return $articleArrResult;
        } else {
            header('Location: http://test25');
            exit();
        }
    }

    public static function getArticleList($pageNum) {
        //Подключаем PDO параметры уже внутри
        $db = Db::getConnection();
        if (isset($pageNum)) {
            $int = intval($pageNum);
            if (is_int($int)) {
                $page = $int;
            } else {
                $page = 1;
            }
        } else {
            $page = 1;
        }
        $notesOnPage = 5;
        $shift = ($page - 1) * $notesOnPage;

        $articleList = [];
        $result = $db->query('SELECT id, title, date, short_content, author_name '
                . 'FROM article '
                . 'ORDER BY date DESC '
                . 'LIMIT ' . $shift . ', ' . $notesOnPage . '');


        $i = 0;
        while ($row = $result->fetch()) {
            $articleList[$i]['id'] = $row['id'];
            $articleList[$i]['title'] = $row['title'];
            $articleList[$i]['date'] = $row['date'];
            $articleList[$i]['short_content'] = $row['short_content'];
            $articleList[$i]['author_name'] = $row['author_name'];
            $i++;
        }
//        ПАГИНАЦИЯ
        $result = $db->query("SELECT COUNT(*) FROM article");
        $result = $result->fetch();
        $count = $result['0'];
        $resultCount = ceil($count / $notesOnPage);

        $resultEnd = [$articleList, $resultCount];
        return $resultEnd;
    }

}
