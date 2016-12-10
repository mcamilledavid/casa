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
    
    public function editRentalUnit() {
        if (isset($_SESSION)||!empty($_SESSION)) {
            $url_param = Manage::getUrlParameter();
            $rental_unit_id = filter_var($url_param, FILTER_SANITIZE_NUMBER_INT);
            $ru = $this->model->getRentalUnitById($rental_unit_id);
            
            require APP . 'view/_templates/header.php';
            require APP . 'view/manage/edit.php';
            require APP . 'view/_templates/footer.php';
            
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    
    public function updateRentalUnit() {
        if (filter_has_var(INPUT_POST, 'update_listing') && $_SESSION['user_id']) {
            $lister_id = $_SESSION['user_id'];
            $rental_unit_id = filter_input(INPUT_POST, 'rental_unit_id', FILTER_SANITIZE_STRING);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
            $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
            $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
            $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
            $beds = filter_input(INPUT_POST, 'beds', FILTER_SANITIZE_STRING);
            $baths = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_STRING);
            $rent = filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_NUMBER_INT);
            $deposit = filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_NUMBER_INT);
            $date_availability = filter_input(INPUT_POST, 'date_availability', FILTER_SANITIZE_STRING);
            $lease_length = filter_input(INPUT_POST, 'lease_length', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $is_rented = filter_input(INPUT_POST, 'is_rented', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $pets = filter_input(INPUT_POST, 'pets', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $smoking = filter_input(INPUT_POST, 'smoking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $furnished = filter_input(INPUT_POST, 'furnished', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $parking = filter_input(INPUT_POST, 'parking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $laundry = filter_input(INPUT_POST, 'laundry', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
            $dist_from_campus = filter_input(INPUT_POST, 'distance_from_campus', FILTER_SANITIZE_NUMBER_FLOAT);
            
            

            $this->model->updateRentalUnit($rental_unit_id, $lister_id, $is_rented,
                    $title, $street, $city, $state, $zipcode, $beds, $baths,
                    $rent, $deposit, $date_availability, $lease_length, 
                    $description, $pets, $smoking, $furnished, $parking, 
                    $laundry, $type, $dist_from_campus);
            
            
            $file = $_FILES["rental_unit_thumb"]["tmp_name"];
            $image = null; //image null by default
            if ($file != null && getimagesize($file)) {
                $image = file_get_contents($file);
            }
            //NOTE FOR IMAGE TABLE:- old image not deleted yet
            if ($image != null) {
                $this->model->addRentalUnitImages($image, $rental_unit_id);
                $this->model->addRentalUnitThumbnail($image, $rental_unit_id);
            }

                   
            $result = $this->model->getRentalUnitsByUserId($_SESSION['user_id']);
            require APP . 'view/_templates/header.php';
            require APP . 'view/manage/index.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: ' . URL . 'home');
        }
    }

    public function markRented() {
        if(!empty($_SESSION)) {
            $url_param = Manage::getUrlParameter();
            $rental_unit_id = filter_var($url_param, FILTER_SANITIZE_NUMBER_INT);
            $this->model->updateAvailability($rental_unit_id,1);
            
            header('location: ' . URL . 'manage');
        }
        else {
            header('location: ' . URL . 'home');
        }
    }
    
    public function markAvailable() {
        if(!empty($_SESSION)) {
            $url_param = Manage::getUrlParameter();
            $rental_unit_id = filter_var($url_param, FILTER_SANITIZE_NUMBER_INT);
            $this->model->updateAvailability($rental_unit_id,0);
            
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
