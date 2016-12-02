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
     
    public function messageLister(){
        
        $message=filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $rental_unit_id=filter_input(INPUT_POST, 'rental_unit_id', FILTER_SANITIZE_STRING);
        $lister_id = filter_input(INPUT_POST, 'lister_id', FILTER_SANITIZE_STRING);
        $student_id = $_SESSION['user_id'];
        
        $query=  $this->model->enterMessage($message,$rental_unit_id,$lister_id,$student_id);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/message/popupmessage.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
     
    }
}
