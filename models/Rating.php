<?php

class Rating {
    
    public static function get_like_info($id_user, $id_article, $inf) {
//        $result = Db::get_result("SELECT * FROM `like_article` WHERE id_user = '$id_user' AND id_article = '$id_article' ");
        if($inf == '1') {
            self::dell_article_rating($id_article, $id_user);
        } elseif($inf == '2') {
            self::add_article_rating($id_article, $id_user);
        }
        return $_SERVER['HTTP_REFERER'];
    }
    private static function add_article_rating($id_article, $id_user) {
        Db::insert_into("UPDATE `article` SET artilce_rating = article_rating + 1 WHERE id = '$id_article' ");
        Db::insert_into("INSERT INTO `like_article` SET id_user = '$id_user', id_article = '$id_article' ");
    }

    private static function dell_article_rating($id_article, $id_user) {
        Db::insert_into("UPDATE `article` SET artilce_rating = article_rating - 1 WHERE id = '$id_article' ");
        Db::insert_into("DELETE FROM `like_article` WHERE id_user = '$id_user' AND id_article = '$id_article' ");
    }
    
    
    }
