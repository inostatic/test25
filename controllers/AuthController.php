<?php

class AuthController {

    public function methodRegistration() {
        include_once ROOT . '/models/Registration.php';
        Registration::regist();
    }

    public function methodLogin() {
        include_once ROOT . '/models/login.php';
        Login::cheackLogin();
    }

    public function methodLogout() {
        
    }

}
