<?php

class AuthController {

    public function methodRegistration($checkAuth) {
        include_once ROOT . '/models/Registration.php';
        Registration::regist($checkAuth);
        include_once ROOT . '/views/Register.php';
    }

    public function methodLogin($checkAuth) {
        include_once ROOT . '/models/login.php';
        Login::cheackLogin($checkAuth);
    }

    public function methodLogout() {
        
    }

}
