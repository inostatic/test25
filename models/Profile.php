<?php


class Profile {
    
    public static function renameFull_name($params) {
        Db::insert_into("UPDATE user SET full_name = '$params[full_name]' WHERE id = '$params[id]'");
    }
    
    
    public static function renameEmail($params) {
        Db::insert_into("UPDATE user SET email = '$params[email]' WHERE id = '$params[id]'");
    }
    
    
    
    public static function getMyProfile($params, $checkAuth) {
        $result = Db::get_result("SELECT full_name, email FROM user WHERE id = " . $params['id']);
        if ($result != NULL) {
            return $result;
        } else {
            header("Location: " . URL);
        }
    }

}
