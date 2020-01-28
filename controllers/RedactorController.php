<?php

class RedactorController {

    public function methodArticles() {
        self::authSession();
        include_once ROOT . '/models/Articles.php';
        $id = $_SESSION['session_username']['id'];
        $articleList = Articles::getArticles($id);
        include_once ROOT . '/views/ArticlesTable.php';
    }

    public function methodAdd() {

        self::authSession();
        include_once ROOT . '/models/Redactor.php';
        if (isset($_POST['add'])) {
            if (!empty($_POST['title']) and ( !empty($_POST['content']))) {
                $params = [];
                $params['title'] = htmlspecialchars($_POST['title']);
                $params['content'] = htmlspecialchars($_POST['content']);
                $params['author_id'] = $_SESSION['session_username']['id'];
                $params['author_name'] = $_SESSION['session_username']['username'];
                $params['short_content'] = mb_substr($params['content'], 0, 300, 'UTF-8');
                $tags = self::checkTags();
                Redactor::addArticle($params, $tags);
                header('Location: ' . URL . '/myarticles');
            }
        }
        include_once ROOT . '/views/AddArticle.php';
    }

    public function methodDelete_tag($id, $id_tag) {
        self::authSession();
        $id *= 1;
        $id_tag *= 1;
        if (is_int($id) and is_int($id_tag)) {
            include_once ROOT . '/models/Delete.php';
            Delete::deleteTag($id_tag);
            header('Location: ' . URL . '/change/' . $id);
        }
    }

    public function methodDelete($id) {
        self::authSession();
        include_once ROOT . '/models/Delete.php';
        if (Delete::deleteArticle($id)) {
            header('Location: ' . URL . '/myarticles');
        }
    }

    public function methodChange($id) {

        self::authSession();
        $id *= 1;
        if (is_int($id)) {
            $params['id'] = $id;
            include_once ROOT . '/models/Redactor.php';
            if (isset($_POST['add'])) {
                if (!empty($_POST['title']) and ! empty($_POST['content'])) {
                    $params['title'] = $_POST['title'];
                    $params['content'] = $_POST['content'];
                    $params['short_content'] = mb_substr($params['content'], 0, 300, 'UTF-8');
                    $tags = self::checkTags();
                    if (Redactor::saveArticle($params, $tags)) {
                        header('Location: ' . URL . '/myarticles');
                        exit();
                    }
                }
            }
            list($article, $tagList) = Redactor::changeArticle($id);

            include_once ROOT . '/views/ChangeArticle.php';
        }
    }

    private static function authSession() {
        if (!isset($_SESSION['session_username'])) {
            header('Location: ' . URL);
            exit();
        } else {
            return true;
        }
    }

    private static function checkTags() {
        if (!empty($_POST['tags'])) {
            $tags = $_POST['tags'];
            return $tags;
        } else
            return "";
    }

}
