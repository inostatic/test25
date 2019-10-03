<?php

class AuthController {
   
    
    public function methodRegister() {
         include_once ROOT.'/models/Register.php';
    }
    
     public function methodLogin() {
        include_once ROOT.'/models/login.php';
        Login::cheackLogin();
    }
    
    public function methodLogout() {
        
    }
}
