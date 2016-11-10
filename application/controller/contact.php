<?php

session_start();

class Contact extends Controller {

    public function index() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/contact/index.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

}