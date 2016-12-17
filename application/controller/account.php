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
            if(isset($_POST["password"])&&$_POST["password"] !=""){
                $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }
            $ret=$this->model->updateUserInfo($_POST["firstname"], $_POST["lastname"],
                    $_POST["email"], $isStudent, isset($pass_hash)?$pass_hash:"", $_SESSION['user_id']);
            if($ret){
                $message = "Account successfully updated!";
                header('location: ' . URL . 'logout');
            }else{
                $message = "Account Update FAILED!";
                
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/message.php';
                require APP . 'view/account/index.php';
                require APP . 'view/_templates/footer.php';
            }
            
        }
    }

}
