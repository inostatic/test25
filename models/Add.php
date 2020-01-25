<?php

class Add {

    public static function addArticle($params, $checkAuth) {

        $result = Db::insert_into("INSERT INTO article (title, content, author_id, author_name, short_content)"
                        . " VALUES ('$params[title]', '$params[content]', '$params[author_id]', '$params[author_name]', '$params[short_content]')");
        return $result;
        
    }

}
