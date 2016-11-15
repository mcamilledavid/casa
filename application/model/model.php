<?php

class Model {

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllRentalUnits() {
        $sql = "SELECT * FROM rental_unit";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    /**
     * @all variables These are the values to be inserted in the database
     */
    //Use this function to add new listing
    //returns the rental_unit_id of the latest Rental unit created
    public function addNewRentalUnit($listerId,$title,$street,$city,$state,$zipcode,
            $beds,$baths,$rent,$deposit,$dateAvailability,$leaseLength,$description,
            $pets,$smoking,$furnished,$parking,$laundry,$type,$distanceFromCampus){
        $sql = "INSERT INTO rental_unit (lister_id,title, street,city,state,"
                . "zipcode,beds,baths,rent,deposit,date_availability,"
                . "lease_length,description,pets,smoking,furnished,parking,"
                . "laundry,type,dist_from_campus,is_rented)"
                . "VALUES (:listerId,:title,:street,:city,:state,:zipcode,:beds,"
                . ":baths,:rent,:deposit,:date_availability,:lease_length,"
                . ":description,:pets,:smoking,:furnished,:parking,:laundry,"
                . ":type,:distance_from_campus,:is_rented)";
        $query = $this->db->prepare($sql);
        $parameters = array(':listerId'=>$listerId,':title'=>$title,':street'=>$street,
            ':city'=>$city,':state'=>$state,':zipcode'=>$zipcode,':beds'=>$beds,
            ':baths'=>$baths,':rent'=>$rent,':deposit'=>$deposit,
            ':date_availability'=>$dateAvailability,':lease_length'=>$leaseLength,
            ':description'=>$description,':pets'=>$pets,':smoking'=>$smoking,
            ':furnished'=>$furnished,':parking'=>$parking,':laundry'=>$laundry,
            ':type'=>$type,':distance_from_campus'=>$distanceFromCampus,':is_rented'=> 0);
        $query->execute($parameters);
        return $this->getLastInsertedRentalUnitId($listerId);
    }
    
    //Use this function to add image for a rental unit
    public function addRentalUnitImages($image,$ru_id){
         $sql = "INSERT INTO image (rental_unit_id,image) VALUES (:rental_unit_id,:image)";
        $query = $this->db->prepare($sql);
        $parameters = array(':rental_unit_id'=>$ru_id,':image' => $image);
        $query->execute($parameters);
     }
    
    //Use this function to add image for a rental unit
    public function addRentalUnitThumbnail($image,$ru_id){
         $sql = "UPDATE rental_unit SET thumbnail=:image WHERE rental_unit_id = $ru_id;";
        $query = $this->db->prepare($sql);
        $parameters = array(':image' => $image);
        $query->execute($parameters);
    } 
     
    /**
     * @listerId returns the id of the last inserted rental unit 
     */
    public function getLastInsertedRentalUnitId($listerId) {       
        $sql = "SELECT LAST_INSERT_ID() AS last_id FROM rental_unit WHERE lister_id = $listerId;";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->last_id;
    }
    
    public function getFeaturedListings(){
        $sql = "SELECT * FROM rental_unit ORDER BY rental_unit_id DESC LIMIT 4";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function search($search) {
        // $filtered_search= preg_replace("#[^0-9a-z]#i", " ", $search);
        $sql = "SELECT * FROM rental_unit WHERE CONCAT_WS('', title, description, zipcode) LIKE '%$search%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addNewUser($firstname, $lastname, $username, $email, $isStudent, $password) {
        $sql = "INSERT INTO registered_user (firstname, lastname, username, email, is_student, password)"
                . "VALUES (:firstname, :lastname, :username, :email, :isStudent, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(':firstname' => $firstname, ':lastname' => $lastname,
            ':username' => $username, ':email' => $email, ':isStudent' => $isStudent,
            ':password' => $password);
        $query->execute($parameters);
    }

    public function userExists($username) {
        $sql = "SELECT COUNT(user_id) AS num_users FROM registered_user WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return ($query->fetch()->num_users == 1) ? true : false;
    }

    public function authenticateUser($username, $password) {
        if (Model::userExists($username)) {
            $hashed_pass = Model::getPasswordFromUsername($username);
            return password_verify($password, $hashed_pass);
        } else {
            return false;
        }
    }

    public function getPasswordFromUsername($username) {
        $sql = "SELECT password AS pass FROM registered_user WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->pass;
    }

    public function getUserFromUsername($username) {
        $sql = "SELECT * FROM registered_user WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function updateUserInfo($firstname, $lastname, $email, $isStudent, $password, $user_id) {
        $sql = "UPDATE registered_user SET firstname = :firstname, lastname = :lastname, "
                . "email = :email, is_student = :isStudent, password = :password  WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':firstname' => $firstname, ':lastname' => $lastname, 
            ':email' => $email, ':isStudent' => $isStudent, ':password' => $password, 
            ':user_id' => $user_id);
        $query->execute($parameters);
    }

    // returns true if rental unit sucessfully added to database, otherwise 
    // returns false
    public function addRentalUnit($lister_id, $title, $street, $city, $state, $zipcode, $beds, $baths, $rent, $deposit, $date_availability, $lease_length, $description, $pets, $smoking, $furnished, $parking, $laundry, $type, $dist_from_campus) {

        $sql = "INSERT INTO rental_unit "
                . "(lister_id, title, street, city, state, zipcode, beds, baths,"
                . " rent, deposit, date_availability, lease_length, description,"
                . " pets, smoking, furnished, parking, laundry, type, dist_from_campus)"
                . "VALUES "
                . "(:lister_id, :title, :street, :city, :state, :zipcode, :beds,"
                . " :baths, :rent, :deposit, :date_availability, :lease_length,"
                . " :description, :pets, :smoking, :furnished, :parking,"
                . " :laundry, :type, :dist_from_campus)";

        $query = $this->db->prepare($sql);

        $parameters = array(':lister_id' => $lister_id, ':title' => $title,
            ':street' => $street, ':city' => $city, ':state' => $state,
            ':zipcode' => $zipcode, ':beds' => $beds, ':baths' => $baths,
            ':rent' => $rent, ':deposit' => $deposit,
            ':date_availability' => $date_availability,
            ':lease_length' => $lease_length, ':description' => $description,
            ':pets' => $pets, ':smoking' => $smoking, ':furnished' => $furnished,
            ':parking' => $parking, ':laundry' => $laundry, ':type' => $type,
            ':dist_from_campus' => $dist_from_campus);

        $status = $query->execute($parameters);

        return $status;
    }

}
