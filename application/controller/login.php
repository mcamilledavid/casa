<?php

session_start();

class Login extends Controller {

    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function logInUser() {

        if (!empty($_POST)) {
          
            $verifyCredentials = $this->model->authenticateUser($_POST['username'], $_POST['password']);

            if ($verifyCredentials == false) {
                $message = "Incorrect username or password!";
                require APP . 'view/_templates/header.php';
                require APP . 'view/login/message.php';
                require APP . 'view/login/index.php';
                require APP . 'view/_templates/footer.php';
            } else {
                $user = $this->model->getUserFromUsername($_POST['username']);
                $_SESSION['username'] = $user->username;

                $message = "You are logged in $user->username";
                require APP . 'view/_templates/header.php';
                require APP . 'view/login/message.php';
                require APP . 'view/_templates/footer.php';
            }
        }
    }
    
}
