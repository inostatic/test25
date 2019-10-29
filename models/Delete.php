<?php

class Delete {

    public static function deleteArticle($id) {
        if (isset($id)) {
            if (!isset($_SESSION['session_username'])) {
                header('Location: http://test25');
                exit();
            } else {
                $db = Db::getConnection();
                $result = $db->query("DELETE FROM article WHERE id = '" . $id . "'");
                if ($result != NULL) {
                    header("Location: http://test25/myarticles");
                    exit();
                } else {
                    echo "error";
                }
            }
        }
    }

}
