<?php

session_start();

class User extends Controller {

    public function index() {

        if (isset($_POST['user_id'])) {
            $user = $this->model->getUserInfo($user_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/user/edit.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/login/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'songs/index');
        }
    }

    public function updateUserInfo() {
        if (isset($_POST["submit_update_user_info"])) {
            $this->model->updateUserInfo($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        }
        header('location: ' . URL . 'songs/index');
    }

}
