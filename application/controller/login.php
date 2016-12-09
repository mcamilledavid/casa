<?php

session_start();

class Login extends Controller {

    public function index() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
        
    }

    public function popuplogin() {

        require APP . 'view/_templates/header.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
        
    }

    public function logInUser() {

        if (!empty($_POST)) {

            $verifyCredentials = $this->model->authenticateUser($_POST['username'], $_POST['password']);

            if ($verifyCredentials == false) {
                $message = "Incorrect username or password!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/message.php';
                require APP . 'view/signup/popupsignup.php';
                require APP . 'view/login/popuplogin.php';
                require APP . 'view/_templates/footer.php';
            } else {
                $user = $this->model->getUserFromUsername($_POST['username']);
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->username;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['lastname'] = $user->lastname;
                $_SESSION['email'] = $user->email;
                $_SESSION['isStudent'] = $user->is_student;
                header('location: ' . URL . 'home');
            }
        }
    }

}
