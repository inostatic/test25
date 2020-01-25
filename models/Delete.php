<?php

class Delete {

    public static function deleteArticle($id) {
        $result = Db::insert_into("DELETE FROM article WHERE id = '" . $id . "'");
        return $result;
    }
}