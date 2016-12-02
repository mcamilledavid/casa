<?php

session_start();

class Message extends Controller {

    public function index() {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/message/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function messageListerButton() {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {

            if (isset($_POST['message_button'])) {
                
                $rental_unit_id = $_POST["rental_unit_id"];
                $lister_id = $_POST["lister_id"];
                
                require APP . 'view/_templates/header.php';
                require APP . 'view/message/index.php';
                require APP . 'view/_templates/footer.php';
            }
        }
    }


}
