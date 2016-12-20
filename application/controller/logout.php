<?php

    /**
     * @file: Class Logout
     * @brief: Ends the user's session and logs out of their account.  
     */
session_start();

class Logout extends Controller {

    /**
    * PAGE: index
    * This method destroys the user's cookies and ends the sesstion. It takes
    * user back to the log in page.
    */
    public function index() {
        
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header('location: ' . URL . 'login');
        
    }

}
