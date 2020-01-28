<?php

class ProfileController {

    public function methodProfile() {
        include_once ROOT . '/models/Profile.php';
        if (isset($_SESSION['session_username'])) {
            $params['id'] = $_SESSION['session_username']['id'];
        }
        if (isset($_POST['submit'])) {
            if (!empty($_POST['full_name'])) {
                $params['full_name'] = $_POST['full_name'];
                Profile::renameFull_name($params);
            }
            if (!empty($_POST['email'])) {
                $params['email'] = $_POST['email'];
                Profile::renameEmail($params);
            }
        }
        $userProfile = Profile::getMyProfile($params);
        include_once ROOT . '/views/ProfileView.php';
    }

}
