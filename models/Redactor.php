<?php

class Redactor {

    public static function addArticle($params, $tags) {

        $article = Db::insert_into("INSERT INTO `article` (title, content, author_id, author_name, short_content)"
                        . " VALUES ('$params[title]', '$params[content]', '$params[author_id]', '$params[author_name]', '$params[short_content]')");
        self::insertTags($params, $tags);
    }

    public static function saveArticle($params, $tags) {
        $result = Db::insert_into("UPDATE article SET title = '$params[title]', content = '$params[content]', short_content = '$params[short_content]' WHERE id = '$params[id]'");
        self::insertTags($params, $tags);

        return $result;
    }

    public static function changeArticle($id) {
        $URL = URL;
        $tagList = "<span id='tags'>";
        $article = Db::get_result("SELECT title, content FROM article WHERE id = '$id'");
        $routes = Db::get_results("SELECT * FROM `routes` WHERE post_id = '$id'");
        if ($routes != NULL) {
            foreach ($routes as $route) {
                $tagArr = Db::get_results("SELECT * FROM `tags` WHERE id = $route[tag_id]");
                foreach ($tagArr as $tag) {
                    $tagList .= "<a class =\"a\" href=\"$URL/bytags/$tag[id]\">$tag[title]</a><a class =\"a\" href=\"$URL/myarticles/delete/tag/$id/$tag[id]\">Удалить</a>";
                }
               $tagList .= "</span><br>";
            }
        }
        if(empty($tagList)) {
            $tagList .= "Вы пока еще не добавили не одного тега<span>";
        }
        return [$article, $tagList];
    }

    private static function insertTags($params, $tags) {
        if (!empty($tags)) {
            $post_id = Db::get_result("SELECT id FROM `article` WHERE title = '$params[title]'");
            $arr = explode(' ', $tags);
            foreach ($arr as $elem) {
                $elem = '#' . $elem;
                $first_tag_id = Db::get_result("SELECT id FROM `tags` WHERE title = '$elem' ");
                if ($first_tag_id == NULL) {
                    Db::insert_into("INSERT INTO `tags` SET title = '$elem'");
                    $tag_id = Db::get_result("SELECT id FROM `tags` WHERE title = '$elem'");
                    Db::insert_into("INSERT INTO `routes` SET tag_id = '$tag_id[id]', post_id = '$post_id[id]'");
                } else {
                    Db::insert_into("INSERT INTO `routes` SET tag_id = '$first_tag_id[id]', post_id = '$post_id[id]'");
                }
            }
        }
    }

}
