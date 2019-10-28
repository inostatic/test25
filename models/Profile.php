<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author bogdanovso
 */
class Profile {

    public static function getMyProfile() {
        if (isset($_SESSION['session_username'])) {
           $db = Db::getConnection();
           if(isset($_POST['submit'])) {
               $id = $_SESSION['session_username']['id'];
               if(!empty($_POST['full_name'])) {
                   $full_name = $_POST['full_name'];
                 $db->query("UPDATE user SET full_name = '$full_name' WHERE id = '$id'");
            
               }
               if(!empty($_POST['email'])) {
                   $email = $_POST['email'];
                   $db->query("UPDATE user SET email = '$email' WHERE id = '$id'");
               }
           }
           $result = $db->query("SELECT full_name, email FROM user WHERE id = ". $_SESSION['session_username']['id']);
           $result->setFetchMode(PDO::FETCH_ASSOC);
           $userProfile = $result->fetch();
           if($userProfile != NULL) {
               return $userProfile;
           }
        } else {
            header("Location: http://test25");
        }
    }

}
