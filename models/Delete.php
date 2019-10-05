<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Delete
 *
 * @author Станислав
 */
class Delete {
    public static function deleteArticle($id) {
        if(isset($id)) {
            $db = Db::getConnection();
            $result = $db->query("DELETE FROM article WHERE id = '".$id."'");
            if($result != NULL) {
                header("Location: http://test25/myarticles");
                exit();
            } else {
                echo "error";
            }
            
        }
        
    }
}
