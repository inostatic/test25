<?php
class Change {

    public static function saveArticle($params) {
        $result = Db::insert_into("UPDATE article SET title = '$params[title]', content = '$params[content]', short_content = '$params[short_content]' WHERE id = '$params[id]'");
        return $result;
    }

    public static function changeArticle($id, $checkAuth) {
        $result = Db::get_result("SELECT title, content FROM article WHERE id = '$id'");
        return $result;
        
    }

}
