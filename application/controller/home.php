<?php

session_start();

class Home extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function search() {

        if (isset($_POST["search"])) {

            $query = $this->model->search($_POST['search']);
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }

}
