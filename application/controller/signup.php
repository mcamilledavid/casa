<?php

/**
 * @file signup.php
 * @brief This page provides functionality for new users
 */

session_start();

class Signup extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
        
    }

    //displays popup for a sign up
    public function popupsignup() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/_templates/footer.php';
    }

    //functionality to add new user to database
    public function addNewUser() {

        if (isset($_POST['submit_add_user'])) {

            if ($this->model->userExists($_POST['username']) == true) {
                $message = "Username taken!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/message.php';
                require APP . 'view/signup/popupsignup.php';
                require APP . 'view/login/popuplogin.php';
                require APP . 'view/_templates/footer.php';
                return;
            }

            $isStudent = isset($_POST["isStudent"]) ? $_POST["isStudent"] : 0;
            $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $this->model->addNewUser($_POST["firstname"], $_POST["lastname"], $_POST["username"], $_POST["email"], $isStudent, $pass_hash);

            header('location: ' . URL . 'login');
        } else {
            header('location: ' . URL . 'signup');
        }
    }

}
