<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment
 *
 * @author Станислав
 */
class comment {
   public static function addComment() {
       if(!isset($_POST['submit'])) {
           echo 'work';
       }
   }
}
