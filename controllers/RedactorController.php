<?php

class RedactorController {

    public function methodArticles() {
        include_once ROOT . '/models/Articles.php';
        Articles::getArticles();
    }

}
