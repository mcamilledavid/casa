<?php

/**
 * Class Login

 */
class Login extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/signup/index
     */
    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
