<?php

     /**
     * @file: Class Contact
     * @brief: Displays the contact information 
     */

session_start();

class Contact extends Controller {

     /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/contacts/index
     */
    public function index() {
        
        // loads the views
        require APP . 'view/_templates/header.php';
        require APP . 'view/contact/index.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }

}