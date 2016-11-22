<?php

session_start();

class Manage extends Controller {

    public function index() {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $result = $this->model->getRentalUnitsByUserId($_SESSION['user_id']);
            require APP . 'view/_templates/header.php';
            require APP . 'view/manage/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    public function popupmessage() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/message/popupmessage.php';
        require APP . 'view/_templates/footer.php';
        
    }

}
