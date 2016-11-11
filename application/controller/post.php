<?php

session_start();

class Post extends Controller {

    public function index() {
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/post/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    public function addRentalUnit() {
        if (filter_has_var(INPUT_POST, 'submit_post_listing') && $_SESSION['user_id']) {
            $lister_id = $_SESSION['user_id'];
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
            $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
            $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
            $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
            $beds = filter_input(INPUT_POST, 'beds', FILTER_SANITIZE_STRING);
            $baths = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_STRING);
            $rent = filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $deposit = filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $date_availability = filter_input(INPUT_POST, 'date_availability', FILTER_SANITIZE_STRING);
            $lease_length = filter_input(INPUT_POST, 'lease_length', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $pets = filter_input(INPUT_POST, 'pets', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $smoking = filter_input(INPUT_POST, 'smoking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $furnished = filter_input(INPUT_POST, 'furnished', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $parking = filter_input(INPUT_POST, 'parking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $laundry = filter_input(INPUT_POST, 'laundry', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
            $dist_from_campus = filter_input(INPUT_POST, 'dist_from_campus', FILTER_SANITIZE_NUMBER_FLOAT);
            
            $added = $this->model->addRentalUnit($lister_id, $title, $street, $city,
                    $state, $zipcode, $beds, $baths, $rent, $deposit, 
                    $date_availability, $lease_length, $description, $pets, $smoking, 
                    $furnished, $parking, $laundry, $type, $dist_from_campus);
            
            if($added == FALSE) {
                // what to do if insertion fails;
            } 
            
            /* change redirection once Manage Listings is setup */
            header('location: ' . URL . 'home');
            
        } else {
            Post::index();
        }
    }

}
