<?php

     /**
     * @file: Class Favorites
     * @brief: Displays the users favorite rental unit 
     */
session_start();

class Favorites extends Controller {

    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/favorites/index
    */
    public function index(){
      
        if (empty($_SESSION)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/signup/index.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $query = $this->model->getFavoritesByUserID($_SESSION['user_id']);
            require APP . 'view/_templates/header.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/account/favorites.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    // marks the rentail unit as your favorite
    public function addFavorite(){
        
        
        if (!empty($_SESSION)) {
           
        
        if (isset($_POST['add_favorite'])) {
            
            $rental_unit_id = $_POST['add_favorite'];
            $this->model->addFavorite($_SESSION['user_id'], $rental_unit_id);
             
            /*header('location: ' . URL . 'favorites/index');*/
        }
    }
    }
    
    // deletes the rentail unit in the users favorite
    public function deleteFavorite(){
        
    if (!empty($_SESSION)) {
           
        
        if (isset($_POST['delete_favorite'])) {
            
            $rental_unit_id = $_POST['delete_favorite'];
            $this->model->deleteFavoriteRentalUnit($rental_unit_id);
             
            header('location: ' . URL . 'favorites/index');
        }
    }
    }
   
  }
