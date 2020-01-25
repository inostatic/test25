<?php

Class Registration {
    
    public static function checkUser($arrRegist) {
        return $row = Db::get_result("SELECT * FROM user WHERE username='" . $arrRegist['username'] . "' AND password='" . $arrRegist['password'] . "'");
    }

    public static function regist($arrRegist ,$checkAuth) {
        
        return $row = Db::insert_into("INSERT INTO user (full_name, email, username, password)"
                                     ."VALUES ('$arrRegist[full_name]', '$arrRegist[email]', '$arrRegist[username]', '$arrRegist[password]')");
                
                }
        
        
    }

