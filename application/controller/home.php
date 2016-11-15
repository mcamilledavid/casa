<?php

session_start();

class Home extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function search() {

        if (isset($_POST["submit_search"])) {

            $query = $this->model->search($_POST["search_value"]);

            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function showListings() {

        $query = $this->model->getAllRentalUnits();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

    public function featuredListings(){
        
        $query = $this->model->getFeaturedListings();
        require APP . 'view/_templates/homeheader.php';
        require APP . 'view/home/index.php';
        require APP . 'view/home/search.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }
}
