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
            $url_param = Manage::getUrlParameter();
            $rental_unit_id = filter_var($url_param, FILTER_SANITIZE_NUMBER_INT);
            $this->model->deleteRentalUnit($rental_unit_id);
            
            header('location: ' . URL . 'manage');
        }
        else {
            header('location: ' . URL . 'home');
        }
    }
    
    public function updateAvailability() {
        if(!empty($_SESSION)) {
            $url_param = Manage::getUrlParameter();
            $rental_unit_id = filter_var($url_param, FILTER_SANITIZE_NUMBER_INT);
            $this->model->updateAvailability($rental_unit_id);
            
            header('location: ' . URL . 'manage');
        }
        else {
            header('location: ' . URL . 'home');
        }
    }
    
    // helper function for parsing a parameter passed via URL
    private static function getUrlParameter() {
        $retval = NULL;
        
        if(filter_has_var(INPUT_GET, 'url')) {
            // split URL (Controller/Action/Parameter)
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            $retval = $url[2];
        }
        
        return $retval;
    }
    
    public function displayMessages(){
        
        if(!empty($_SESSION)){
            $lister_id=$_SESSION["user_id"];
            $query=$this->model->fetchMessages($lister_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/manage/viewMessages.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }
}
