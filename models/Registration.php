<?php

Class Registration {

    public static function regist($checkAuth) {
        if (isset($_POST['register'])) {
            if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                $full_name = htmlspecialchars($_POST['full_name']);
                $email = htmlspecialchars($_POST['email']);
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $db = Db::getConnection();
                $result = $db->query("SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'");
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                if ($row == NULL) {
                    $query = "INSERT INTO user (full_name, email, username, password) VALUES ('$full_name', '$email', '$username', '$password')";
                    $db->query($query);
                    $_SESSION['session_username'] = ['full_name' => $full_name, 'email' => $email, 'username' => $username, 'password' => $password];
                    header("Location: http://test25");
                    exit();
                } else {
                    $message = 'Пользователь с таким e-mail уже существует!';
                }
            } else {
                $message = 'Заполните все поля!';
            }
        }
        
        
    }

}
