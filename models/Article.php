<?php

class Article {

    public static function getArticleItemById($userSetting) {
        //Обрезаем если число не целое
        $id = intval($userSetting['id']);
        //Добавить новый комментарий в базу
        if (isset($userSetting['comment'])) {
            $result = Db::insert_into("INSERT INTO comments (comment, author_id, author_name, article_id)"
                            . "VALUES ('$userSetting[comment]', '$userSetting[author_id]', '$userSetting[author_name]', '$id')");
            if ($result != NULL) {
                header("Location: " . URL . "/article/$id");
                exit();
            }
        }
        //получаем статью
        $articleItem = Db::get_result('SELECT*FROM article WHERE id=' . $id);
        $url = URL;
        if(defined('USER_ID')) {
            $id_user = USER_ID;
            $like = Db::get_result("SELECT * FROM `like_article` WHERE id_user = '$id_user' AND id_article = '$id'");
            if($like != NULL) {
                $articleItem['like'] = "<span class=\"like\"> $articleItem[article_rating] </span>"
                        ."<span class=\"date\"><a href=\"$url/addlike/$id/1\"><img width=\"20\"  src=\"../template/images/1heart.png\"></a></span>";
            } elseif($like == NULL) {
                $articleItem['like'] = "<span class=\"like\"> $articleItem[article_rating] </span>"
                        ."<span class=\"date\"><a href=\"$url/addlike/$id/2\"><img width=\"20\"  src=\"../template/images/2heart.png\"></a></span>";
            }
        } else {
            $articleItem['like'] = "<span class=\"like\"> $articleItem[article_rating] </span>"
                    ."<span class=\"date\"><a><img width=\"20\"  src=\"../template/images/2heart.png\"></a></span>";
        }
      
        
        $articleComments = Db::get_results('SELECT*FROM comments WHERE article_id = ' . $id
                        . ' ORDER BY date DESC');

        return $articleArrResult = [$articleItem, $articleComments];
    }

    public static function getArticleList($pageNum) {

        list($notesOnPage, $shift) = self::pagination($pageNum);
        $articleList = Db::get_results('SELECT id, title, date, short_content, author_name '
                        . 'FROM article '
                        . 'ORDER BY date DESC '
                        . 'LIMIT ' . $shift . ', ' . $notesOnPage . '');
        
 
//            foreach ($articleList as $elem) {
//            if (defined('USER_ID')) {
//                $id_user = USER_ID;
//                $like = Db::get_result("SELECT * FROM `like_article` WHERE id_user = '$id_user'");
//                if ($like['id_article'] == $elem['id'])
//                    $articleList[$elem]['like'] = "<span class=\"like\"> $articleItem[article_rating] </span>"
//                            . "<span class=\"date\"><a href=\"$url/addlike/$id/1\"><img width=\"20\"  src=\"../template/images/1heart.png\"></a></span>";
//            } else {
//                $articleList[$elem]['like'] = "<span class=\"like\"> $articleItem[article_rating] </span>"
//                        . "<span class=\"date\"><a href=\"$url/addlike/$id/2\"><img width=\"20\"  src=\"../template/images/2heart.png\"></a></span>";
//            }
//        }

        $count = Db::get_result("SELECT COUNT(*) FROM article");
        $count = $count['COUNT(*)'];
        $resultCount = ceil($count / $notesOnPage);


        return [$articleList, $resultCount];
    }

    public static function getArticleTag($articleList, $flag) {
        $URL = URL;
        $tagList = [];
        if ($flag) {
            $routes = Db::get_results("SELECT * FROM `routes` WHERE post_id = '$articleList[id]'");
            if ($routes != NULL) {
                foreach ($routes as $route) {
                    $tagArr = Db::get_results("SELECT * FROM `tags` WHERE id = $route[tag_id]");
                    foreach ($tagArr as $tag) {
                        $tagList[] = "<a href=\"$URL/bytags/$tag[id]\">$tag[title]</a>";
                    }
                }
                return $tagList;
            } else
                return false;
        }


        foreach ($articleList as $elem) {
            $routes = Db::get_results("SELECT * FROM `routes` WHERE post_id = $elem[id]");
            if ($routes != NULL) {
                foreach ($routes as $route) {
                    $tagArr = Db::get_results("SELECT * FROM `tags` WHERE id = $route[tag_id]");
                    foreach ($tagArr as $tag) {
                        $tagList[$elem['id']][] = "<a href=\"$URL/bytags/$tag[id]\">$tag[title]</a>";
                    }
                }
            }
        }
        return $tagList;
    }

    public static function getArticleListByTag($id, $pageNum) {
        list($notesOnPage, $shift) = self::pagination($pageNum);
        $result = Db::get_results("SELECT * FROM `routes` WHERE tag_id = $id");

        $post_id = [];
        foreach ($result as $elem) {
            $post_id[] = $elem['post_id'];
        }

        $articleArr = [];
        foreach ($post_id as $elem) {
            $row = Db::get_results('SELECT id, title, date, short_content, author_name '
                            . 'FROM article '
                            . 'WHERE id = ' . $elem
                            . ' ORDER BY date DESC '
                            . 'LIMIT ' . $shift . ', ' . $notesOnPage . '');
            $articleArr[] = $row;
        }
        $tagArr = [];
        foreach ($articleArr as $articleList) {
            $tagArr[] = self::getArticleTag($articleList, $flag = false);
        }
        $articleArr = array_reverse($articleArr);
        $count = count($articleArr);
        $resultCount = ceil($count / $notesOnPage);
        return [$articleArr, $tagArr, $resultCount];
    }

    private static function pagination($pageNum) {
        $int = intval($pageNum);
        if (is_int($int)) {
            $page = $int;
        } else {
            $page = 1;
        }

        $notesOnPage = 10;
        $shift = ($page - 1) * $notesOnPage;
        return [$notesOnPage, $shift];
    }

}
