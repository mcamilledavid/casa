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

            $_SESSION["search_term"]=$_POST["search_value"];
            $query = $this->model->search($_POST["search_value"]);
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    public function filteredSearch() {

        if (isset($_POST["apply_filters"])) {

            if(isset($_POST) && array_key_exists('laundry',$_POST)){
                $laundry= $_POST['laundry'];
            }else{
                $laundry= 0;
            }
            
            if(isset($_POST) && array_key_exists('deposit',$_POST)){
                $deposit= $_POST['deposit'];
            }else{
                $deposit= 0;
            }
            
            if(isset($_POST) && array_key_exists('pets',$_POST)){
                $pets= $_POST['pets'];
            }else{
                $pets= 0;
            }
            
            if(isset($_POST) && array_key_exists('smoking',$_POST)){
                $smoking= $_POST['smoking'];
            }else{
                $smoking= 0;
            }
            
            if(isset($_POST) && array_key_exists('furnished',$_POST)){
                $furnished= $_POST['furnished'];
            }else{
                $furnished= 0;
            }
                
            if(isset($_POST) && array_key_exists('parking',$_POST)){
                $parking= $_POST['parking'];
            }else{
                $parking= 0;
            }
            
            
            $query = $this->model->applyFilter(isset($_SESSION["search_term"])?$_SESSION["search_term"]:"",$_POST["min_rent"], 
                    $_POST["max_rent"], $deposit, $_POST["type"], $_POST["min_beds"], $_POST["min_baths"], 
                    $_POST["max_lease_length"], $_POST["distance_from_campus"], $pets, $smoking, 
                    $laundry,$furnished, $parking);
            
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
        require APP . 'view/home/search.php';
        require APP . 'view/message/popupmessage.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
     
    }

}
