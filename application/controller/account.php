<?php

session_start();

class Account extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/login/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

    public function updateUserInfo() {

        if (isset($_POST['submit_update_user']) && $_SESSION['user_id']) {

            $isStudent = isset($_POST["isStudent"]) ? $_POST["isStudent"] : 0;
            $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $this->model->updateUserInfo($_POST["firstname"], $_POST["lastname"], $_POST["username"], $_POST["email"], $isStudent, $pass_hash, $_SESSION['user_id']);

            $message = "Account successfully updated!";
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/message.php';
            require APP . 'view/account/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }

}
