<?php

session_start();

class Home extends Controller {

    public function index() {

        if (empty($_SESSION)) {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/homeheader.php';
            require APP . 'view/home/index.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } else {
            $featured = $this->model->getFeaturedListings();
            require APP . 'view/_templates/homeheader.php';
            require APP . 'view/message/popupmessage.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    public function resetFilters(){
        $filterMap = [  "min_rent" => "", 
                        "max_rent" => "",
                        "type" => "Any", 
                        "min_beds" => "Any",
                        "min_baths" => "Any", 
                        "max_lease_length" => "Any",
                        "distance_from_campus" => "Any", 
                        "laundry" => "Any",
                        "deposit" => "Any", 
                        "pets" => "Any",
                        "smoking" => "Any", 
                        "furnished" => "Any",
                        "parking" => "Any"
                    ];
        
        $_SESSION["FILTER_MAP"]=$filterMap;
    }

    public function search() {

        if (isset($_POST["submit_search"])) {
            $this->resetFilters();
            $_SESSION["search_term"]=$_POST["search_value"];
            $query = $this->model->search($_POST["search_value"]);
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }
    
    public function filteredSearch() {
        
        if (isset($_POST["apply_filters"])) {
            
            $filterMap = $_SESSION["FILTER_MAP"];
            $filterMap["min_rent"]=$_POST["min_rent"];
            $filterMap["max_rent"]=$_POST["max_rent"];
            $filterMap["type"]=$_POST["type"];
            $filterMap["min_beds"]=$_POST["min_beds"];
            $filterMap["min_baths"]=$_POST["min_baths"];
            $filterMap["max_lease_length"]=$_POST["max_lease_length"];
            $filterMap["distance_from_campus"]=$_POST["distance_from_campus"];

            if(isset($_POST) && array_key_exists('laundry',$_POST)){
                $laundry= $_POST['laundry'];
            }else{
                $laundry= 0;
            }
            $filterMap["laundry"]=$laundry;
            
            if(isset($_POST) && array_key_exists('deposit',$_POST)){
                $deposit= $_POST['deposit'];
            }else{
                $deposit= 0;
            }
            $filterMap["deposit"]=$deposit;
            
            if(isset($_POST) && array_key_exists('pets',$_POST)){
                $pets= $_POST['pets'];
            }else{
                $pets= 0;
            }
            $filterMap["pets"]=$pets;
            
            if(isset($_POST) && array_key_exists('smoking',$_POST)){
                $smoking= $_POST['smoking'];
            }else{
                $smoking= 0;
            }
            $filterMap["smoking"]=$smoking;
            
            if(isset($_POST) && array_key_exists('furnished',$_POST)){
                $furnished= $_POST['furnished'];
            }else{
                $furnished= 0;
            }
            $filterMap["furnished"]=$furnished;
                
            if(isset($_POST) && array_key_exists('parking',$_POST)){
                $parking= $_POST['parking'];
            }else{
                $parking= 0;
            }
            $filterMap["parking"]=$parking;
            
             $_SESSION["FILTER_MAP"] = $filterMap;
            
            $query = $this->model->applyFilter(isset($_SESSION["search_term"])?$_SESSION["search_term"]:"",
                    $_POST["min_rent"], $_POST["max_rent"], $deposit, $_POST["type"], 
                    $_POST["min_beds"], $_POST["min_baths"], $_POST["max_lease_length"], 
                    $_POST["distance_from_campus"], $pets, $smoking, $laundry, $furnished, $parking);
            
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } 
        else if (isset($_POST["clear_filters"])) {
            if(isset($_SESSION["search_term"]) &&$_SESSION["search_term"]!="" ){
                $this->resetFilters();
                $query = $this->model->search($_SESSION["search_term"]);
            
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/search.php';
                require APP . 'view/signup/popupsignup.php';
                require APP . 'view/login/popuplogin.php';
                require APP . 'view/_templates/footer.php';
            }else{
                $this->showListings();
            }
            
        }
    }
    
    public function showListings() {

        $_SESSION["search_term"]="";
        $this->resetFilters();
        $query = $this->model->getAllRentalUnits();
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/search.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }
    



    public function showSelectedListing(){
        $rental_unit_id=$_GET['rental_unit_id'];
        $query=$this->model->showListingsDetails($rental_unit_id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/details.php';
        require APP . 'view/signup/popupsignup.php';
        require APP . 'view/login/popuplogin.php';
        require APP . 'view/_templates/footer.php';
    }
}
