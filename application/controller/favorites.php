<?php

session_start();

class Favorites extends Controller {

    
  public function index(){
      
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $favorites = $this->model->getFavoritesByUserID($_SESSION['user_id']);
            require APP . 'view/_templates/header.php';
            require APP . 'view/account/favorites.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    public function addFavorite(){
        
        
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
        
        if (isset($_POST['add_favorite'])) {
            
            $rental_unit_id = $_POST['add_favorite'];
            $this->model->addFavorite($_SESSION['user_id'], $rental_unit_id);
             
            header('location: ' . URL . 'home/showListings');
        }
    }
    }
   
  }
