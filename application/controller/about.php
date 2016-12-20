<?php

    /**
     * @file: Class About
     * @brief: Displays the about page 
     */

session_start();

class About extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/about/index
     */
    public function index() {
        
        // loads the about page views
        require APP . 'view/_templates/header.php';
        require APP . 'view/about/index.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

}