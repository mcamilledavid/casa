<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

    public function deleteRentalUnit() {
        if(!empty($_SESSION)) {
            // split URL (manage/deleteRentalUnit/rental_unit_id)
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            $rental_unit_id = filter_var($url[2], FILTER_SANITIZE_NUMBER_INT);

            $this->model->deleteRentalUnit($rental_unit_id);
            
            header('location: ' . URL . 'manage');
        }
        else {
            header('location: ' . URL . 'home');
        }
    }
    
}
