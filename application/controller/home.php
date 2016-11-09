<?php

session_start();

class Home extends Controller {

    public function index() {

        $rental_units = $this->model->getAllRentalUnits();

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/signup/index.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function search() {
        if (isset($_POST["search"])) {
            $query = $this->model->search($_POST["search"]);
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/login/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

}
