<?php

class AuthController {

    public static function methodRegistration() {
        include_once ROOT . '/models/Registration.php';
        $arrRegist = [];
        if (isset($_POST['register'])) {
            if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {

                $arrRegist['full_name'] = htmlspecialchars($_POST['full_name']);
                $arrRegist['email'] = htmlspecialchars($_POST['email']);
                $arrRegist['username'] = htmlspecialchars($_POST['username']);
                $arrRegist['password'] = htmlspecialchars($_POST['password']);

                $row = Registration::checkUser($arrRegist);
                if ($row == NULL) {
                    $result = Registration::regist($arrRegist);
                    if ($result) {
                        self::auth($arrRegist['username'], $arrRegist['password']);
                    }
                }
            }
        }





        include_once ROOT . '/views/Register.php';
    }

    public static function methodLogin() {

        if (isset($_POST["submit"])) {
            if (!empty($_POST['username']) and ! empty($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                self::auth($username, $password);
            }
        }
    }

    private static function auth($username, $password) {
        include_once ROOT . '/models/login.php';
        $row = Login::cheackLogin($username, $password);
        if ($row != NULL) {
            $_SESSION['session_username'] = $row;
            header("Location: " . URL);
        } else {
            header('Location: ../components/erorr_file.php');
        }
    }

}
