<?php

session_start();

class About extends Controller {

    public function index() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/about/index.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

}