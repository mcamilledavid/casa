<?php

session_start();

class Account extends Controller {

    public function index() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/account/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
