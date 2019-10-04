<?php

class Add {

    public static function addArticle() {
        if (isset($_POST['add'])) {
            if (!empty($_POST['title']) and ( !empty($_POST['content']))) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $author_id = $_SESSION['session_username']['id'];
                $author_name = $_SESSION['session_username']['username'];
                $short_content = mb_substr($content, 0, 453, 'UTF-8');
                $db = Db::getConnection();
                $query = "INSERT INTO article (title, content, author_id, author_name, short_content) VALUES ('$title', '$content', '$author_id', '$author_name', '$short_content')";
                $result = $db->query($query);
                if ($result != NULL) {
                    header('Location: http://test25/myarticles');
                    exit();
                } else {
                    var_dump($result);
                    echo '<br>';
                    var_dump($title);
                    echo "<br>";
                    var_dump($content);
                    echo "<br>";
                    var_dump($author_id);
                    echo "<br>";
                    var_dump($author_name);
                    echo "<br>";
                    var_dump($short_content);
                    
                    
                }
            } else {
//                $messege = 'Заполните все поля';
                echo 'empty';
            }
        } else {
            echo 'isset';
        }
    }

}
