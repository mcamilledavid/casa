<?php

     /**
     * @file: Class Home
     * @brief: Contains the search and filter functionality 
     *         and displays the home page
     */
session_start();

class Home extends Controller {

    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/casa/index
    */
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
    
    // Default filters value
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
                        "parking" => "Any",
                        "sort_by" => 1
                    ];
        
        $_SESSION["FILTER_MAP"]=$filterMap;
    }

    // Displays the search results
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
    
    // Displays the rental unit corresponding to the filters constraints
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
            
            if(isset($filterMap) && array_key_exists('sort_by',$filterMap)){
                $sort_by= $filterMap['sort_by'];
            }else{
                $sort_by= 1;
            }
            $filterMap["sort_by"]=$sort_by;
            
            $_SESSION["FILTER_MAP"] = $filterMap;
            
            $query = $this->model->applyFilter(isset($_SESSION["search_term"])?$_SESSION["search_term"]:"",
                    $_POST["min_rent"], $_POST["max_rent"], $deposit, $_POST["type"], 
                    $_POST["min_beds"], $_POST["min_baths"], $_POST["max_lease_length"], 
                    $_POST["distance_from_campus"], $pets, $smoking, $laundry, $furnished, $parking,$sort_by);
            
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
    
    // Displays the rental unit corresponding the user's sort functionality
    public function sortedFilteredSearch() {
        
        if (isset($_POST["sort_rental_units"])) {
            
            $filterMap = $_SESSION["FILTER_MAP"];
            $min_rent = $filterMap["min_rent"];
            $max_rent=$filterMap["max_rent"];
            $type = $filterMap["type"];
            $min_beds = $filterMap["min_beds"];
            $min_baths = $filterMap["min_baths"];
            $max_lease_length = $filterMap["max_lease_length"];
            $distance_from_campus = $filterMap["distance_from_campus"];

            if(isset($filterMap) && array_key_exists('laundry',$filterMap)){
                $laundry= $filterMap['laundry'];
            }else{
                $laundry= 0;
            }
            $filterMap["laundry"]=$laundry;
            
            if(isset($filterMap) && array_key_exists('deposit',$filterMap)){
                $deposit= $filterMap['deposit'];
            }else{
                $deposit= 0;
            }
            $filterMap["deposit"]=$deposit;
            
            if(isset($filterMap) && array_key_exists('pets',$filterMap)){
                $pets= $filterMap['pets'];
            }else{
                $pets= 0;
            }
            $filterMap["pets"]=$pets;
            
            if(isset($filterMap) && array_key_exists('smoking',$filterMap)){
                $smoking= $filterMap['smoking'];
            }else{
                $smoking= 0;
            }
            $filterMap["smoking"]=$smoking;
            
            if(isset($filterMap) && array_key_exists('furnished',$filterMap)){
                $furnished= $filterMap['furnished'];
            }else{
                $furnished= 0;
            }
            $filterMap["furnished"]=$furnished;
                
            if(isset($filterMap) && array_key_exists('parking',$filterMap)){
                $parking= $filterMap['parking'];
            }else{
                $parking= 0;
            }
            $filterMap["parking"]=$parking;
            
            if(isset($_POST) && array_key_exists('sort_rental_units',$_POST)){
                $sort_by= $_POST['sort_rental_units'];
            }else{
                $sort_by= 1;
            }
            $filterMap["sort_by"]=$sort_by;
            
            $_SESSION["FILTER_MAP"] = $filterMap;
            
            $query = $this->model->applyFilter(isset($_SESSION["search_term"])?$_SESSION["search_term"]:"",
                    $min_rent, $max_rent, $deposit, $type, $min_beds, $min_baths,
                    $max_lease_length, $distance_from_campus, $pets, $smoking,
                    $laundry, $furnished, $parking,$sort_by);
            
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/search.php';
            require APP . 'view/signup/popupsignup.php';
            require APP . 'view/login/popuplogin.php';
            require APP . 'view/_templates/footer.php';
        } 
        
    }
    
    
    // Displays a list of rental units
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
