<?php

/**
 * Class Signup

 */
class Signup extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/signup/index
     */
    public function index() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/signup/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addNewUser() {
        $error = false;

        if (isset($_POST['btn-signup'])) {

            // clean user inputs to prevent sql injections
            $name = trim($_POST['name']);
            $name = strip_tags($name);
            $name = htmlspecialchars($name);

            $email = trim($_POST['email']);
            $email = strip_tags($email);
            $email = htmlspecialchars($email);

            $pass = trim($_POST['pass']);
            $pass = strip_tags($pass);
            $pass = htmlspecialchars($pass);

            // basic name validation
            if (empty($name)) {
                $error = true;
                $nameError = "Please enter your full name.";
            } else if (strlen($name) < 3) {
                $error = true;
                $nameError = "Name must have atleat 3 characters.";
            } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
                $error = true;
                $nameError = "Name must contain alphabets and space.";
            }

            //basic email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $emailError = "Please enter valid email address.";
            } else {
                // check email exist or not
                $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
                $result = mysql_query($query);
                $count = mysql_num_rows($result);
                if ($count != 0) {
                    $error = true;
                    $emailError = "Provided Email is already in use.";
                }
            }
            // password validation
            if (empty($pass)) {
                $error = true;
                $passError = "Please enter password.";
            } else if (strlen($pass) < 6) {
                $error = true;
                $passError = "Password must have atleast 6 characters.";
            }

            // password encrypt using SHA256();
            $password = hash('sha256', $pass);

            // if there's no error, continue to signup
            if (!$error) {

                $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
                $res = mysql_query($query);

                if ($res) {
                    $errTyp = "success";
                    $errMSG = "Successfully registered, you may login now";
                    unset($name);
                    unset($email);
                    unset($pass);
                } else {
                    $errTyp = "danger";
                    $errMSG = "Something went wrong, try again later...";
                }
            }
        }
    }

    public function authenticateUser() {
        if (isset($_POST["search"])) {
            $query = $this->model->search();
        }
    }

}
