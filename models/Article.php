<?php

class Article {

    public static function getArticleItemById($userSetting, $checkAuth) {
        //Обрезаем если число не целое
        $id = intval($userSetting['id']);
        //Добавить новый комментарий в базу
        if (isset($userSetting['comment'])) {
            $result = Db::insert_into("INSERT INTO comments (comment, author_id, author_name, article_id)"
            ."VALUES ('$userSetting[comment]', '$userSetting[author_id]', '$userSetting[author_name]', '$id')");
            if ($result != NULL) {
                header("Location: ".URL."/article/$id");
                exit();
            }
        }
        //получаем статью
        $articleItem = Db::get_result('SELECT*FROM article WHERE id=' . $id);
        $articleComments = Db::get_results('SELECT*FROM comments WHERE article_id = ' . $id
                        . ' ORDER BY date DESC');
        return $articleArrResult = [$articleItem, $articleComments];
    }

    public static function getArticleList($pageNum, $checkAuth) {
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
        $notesOnPage = 10;
        $shift = ($page - 1) * $notesOnPage;

        $articleList = Db::get_results('SELECT id, title, date, short_content, author_name '
                        . 'FROM article '
                        . 'ORDER BY date DESC '
                        . 'LIMIT ' . $shift . ', ' . $notesOnPage . '');



//        ПАГИНАЦИЯ
        $count = Db::get_result("SELECT COUNT(*) FROM article");
        $count = $count['COUNT(*)'];
        $resultCount = ceil($count / $notesOnPage);

        $resultEnd = [$articleList, $resultCount, $checkAuth];
        return $resultEnd;
    }

}
