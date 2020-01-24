<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Change
 *
 * @author Станислав
 */
class Change {

    public static function changeArticle($id, $checkAuth) {
        if (!isset($_SESSION['session_username'])) {
            header('Location: http://test25');
            exit();
        } else {
            $db = Db::getConnection();
            if (isset($_POST['add'])) {
                if (!empty($_POST['title']) and ! empty($_POST['content'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $short_content = mb_substr($content, 0, 453, 'UTF-8');
                    $result = $db->query("UPDATE article SET title = '$title', content = '$content', short_content = '$short_content' WHERE id = '$id'");
                    if ($result != NULL) {
                        header("Location: http://test25/myarticles");
                        exit();
                    }
                }
            }
            $result = $db->query("SELECT title, content FROM article WHERE id = '$id'");
            if ($result != NULL) {
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $articleItem = $result->fetch();
                return $articleItem;
            }
        }
    }

}
