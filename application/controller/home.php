<?php

session_start();

class Home extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/homeheader.php';
            require APP . 'view/home/index.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/homeheader.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function search() {

        if (isset($_POST["submit_search"])) {

            $query = $this->model->search($_POST["search_value"]);

            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function showListings() {

        $query = $this->model->getAllRentalUnits();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/message/popupmessage.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function messageLister(){
        $message=filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $rental_unit_id=filter_input(INPUT_POST, 'rental_unit_id', FILTER_SANITIZE_STRING);
        $lister_id = filter_input(INPUT_POST, 'lister_id', FILTER_SANITIZE_STRING);
        $student_id = $_SESSION['user_id'];
        $query=  $this->model->enterMessage($message,$rental_unit_id,$lister_id,$student_id);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/message/popupmessage.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
     
    }

}
