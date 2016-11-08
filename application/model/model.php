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

    public function search($search) {
        $search = preg_replace("#[^0-9a-z]#i", " ", $search);
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
        $sql = "SELECT username FROM registered_user WHERE username = '$username'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

}
