<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfileController
 *
 * @author bogdanovso
 */
class ProfileController {

    public function methodProfile() {
        include_once ROOT . '/models/Profile.php';
        $userProfile = Profile::getMyProfile();
        include_once ROOT . '/views/ProfileView.php';
    }

}
