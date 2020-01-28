<?php

class Login {

    public static function cheackLogin($username, $password) {
       
        $result = Db::get_result("SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'");
        return $result;  
    }

}
