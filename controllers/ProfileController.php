<?php
class ProfileController {

    public function methodProfile($checkAuth) {
        include_once ROOT . '/models/Profile.php';
        $userProfile = Profile::getMyProfile($checkAuth);
        include_once ROOT . '/views/ProfileView.php';
    }

}
