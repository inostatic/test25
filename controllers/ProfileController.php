<?php
class ProfileController {

    public function methodProfile() {
        include_once ROOT . '/models/Profile.php';
        $userProfile = Profile::getMyProfile();
        include_once ROOT . '/views/ProfileView.php';
    }

}
