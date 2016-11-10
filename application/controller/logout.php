<?php

session_start();

class Logout extends Controller {

    public function index() {
        
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        
        $message = "You are signed out.";
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/message.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

}
