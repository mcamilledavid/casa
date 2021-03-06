<?php

session_start();

class Post extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
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

    public function addNewPosting() {
        if (isset($_POST['submit_post_listing'])) { //form button is pressed
            //clearing message on screen load
            $listerId = $_SESSION['user_id'];

            $title = $_POST['title'];

            $street = $_POST['street'];

            $city = $_POST['city'];

            $state = $_POST['state'];

            $zipcode = $_POST['zipcode'];

            $beds = array_key_exists('beds', $_POST) ? $_POST['beds'] : 1;
            $baths = array_key_exists('baths', $_POST) ? $_POST['baths'] : 1;

            $rent = $_POST['rent'];

            $deposit = $_POST['deposit'];

            $dateAvailability = $_POST['date_availability'];

            $leaseLength = $_POST['lease_length'];

            $description = $_POST['description'];

            if (isset($_POST) && array_key_exists('pets', $_POST)) {
                $pets = $_POST['pets'];
            } else {
                $pets = 0;
            }

            if (isset($_POST) && array_key_exists('smoking', $_POST)) {
                $smoking = $_POST['smoking'];
            } else {
                $smoking = 0;
            }

            if (isset($_POST) && array_key_exists('furnished', $_POST)) {
                $furnished = $_POST['furnished'];
            } else {
                $furnished = 0;
            }

            if (isset($_POST) && array_key_exists('parking', $_POST)) {
                $parking = $_POST['parking'];
            } else {
                $parking = 0;
            }

            if (isset($_POST) && array_key_exists('laundry', $_POST)) {
                $laundry = $_POST['laundry'];
            } else {
                $laundry = 0;
            }

            $type = $_POST['type'];

            $distanceFromCampus = $_POST['distance_from_campus'];

            $last_ru_id = $this->model->addNewRentalUnit($listerId, $title, $street, $city, $state, $zipcode, $beds, $baths, $rent, $deposit, $dateAvailability, $leaseLength, $description, $pets, $smoking, $furnished, $parking, $laundry, $type, $distanceFromCampus);

            $file = $_FILES["rental_unit_thumb"]["tmp_name"];
            $image = null; //image null by default
            if ($file != null && getimagesize($file)) {
                // resizeImage function located in core/controller.php file
//                    parent::resizeImage($file);
                $image = file_get_contents($file);
            }
            //sends to addImage function in model.php
            $this->model->addRentalUnitImages($image, $last_ru_id);
            $this->model->addRentalUnitThumbnail($image, $last_ru_id);
            // header('location: '. URL . 'home/index.php');

            require APP . 'view/_templates/header.php';
            require APP . 'view/post/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'user/signup');
        }
    }

    //adds a rental unit to the databse
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
            $rent = filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_NUMBER_INT);
            $deposit = filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_NUMBER_INT);
            $date_availability = filter_input(INPUT_POST, 'date_availability', FILTER_SANITIZE_STRING);
            $lease_length = filter_input(INPUT_POST, 'lease_length', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $pets = filter_input(INPUT_POST, 'pets', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $smoking = filter_input(INPUT_POST, 'smoking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $furnished = filter_input(INPUT_POST, 'furnished', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $parking = filter_input(INPUT_POST, 'parking', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $laundry = filter_input(INPUT_POST, 'laundry', FILTER_SANITIZE_NUMBER_INT) == NULL ? 0 : 1;
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
            $dist_from_campus = filter_input(INPUT_POST, 'distance_from_campus', FILTER_SANITIZE_NUMBER_FLOAT);

            $added = $this->model->addRentalUnit($lister_id, $title, $street, $city, $state, $zipcode, $beds, $baths, $rent, $deposit, $date_availability, $lease_length, $description, $pets, $smoking, $furnished, $parking, $laundry, $type, $dist_from_campus);

            if ($added == FALSE) {
                // what to do if insertion fails;
            }

            $last_ru_id = $this->model->getLastInsertedRentalUnitId($lister_id);
            $file = $_FILES["rental_unit_thumb"]["tmp_name"];
            $image = null; //image null by default
            if ($file != null && getimagesize($file)) {
                // resizeImage function located in core/controller.php file
//                    parent::resizeImage($file);
                $image = file_get_contents($file);
            }
            //sends to addImage function in model.php
            $this->model->addRentalUnitImages($image, $last_ru_id);
            $this->model->addRentalUnitThumbnail($image, $last_ru_id);

            header('location: ' . URL . 'manage');
        } else {
            Post::index();
        }
    }

}
