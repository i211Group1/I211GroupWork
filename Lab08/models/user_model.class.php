<?php

/**
 * Author: Jon Ross Richardson and Jennifer Baldwin
 * Date: 11/9/2022
 * File: user_controller.class.php
 * Description: model for the user model
 */

class UserModel {

    //private data members
    private $db, $dbConnection, $tblUsers;

    //constructor for the class. Establishes a connection to the DB
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }


    public static function getUserModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }


    //method to add a user to the DB
    public function add_user(){
        //get username from form
        $username = $_GET("username");
        //get password from form
        $password = $_GET("password");
        //hash the password
        $hashPassword = password_hash($password);

        //get email from form
        $email = $_GET("email");
        //get first and last name from form
        $fName = $_GET("fName");
        $lName = $_GET("lName");
        //start sql
        $sql = "INSERT INTO users, VALUES(". $username .",".$hashPassword.",".$email.",".$fName.",".$lName.")";
        //execute query
        $query = $this->dbConnection->query($sql);
        //return false if fail
        if (!$query){
            return false;

        }
        //return true if successful
        else return true;

    }

    //method to verify a user is already in the DB and creates a cookie to store the username
    public function verify_user(){
        //get username and password from for
        $username = $_GET("username");
        $password = $_GET("password");
        //find username in database
        $sql = "SELECT * FROM users WHERE users.username=".$username;
        //execute query
        $query = $this->dbConnection->query($sql);

        //if 0, then pass false
        if(!$query){
            return false;
        }
        //search succeeded, but no user was found.
        if ($query->num_rows == 0) {
            return false;
        }
        //get DB obj and store into var
        $passwordDB = $query->fetch_object();
        $passwordHash = $passwordDB->password;
        //compare password and hash password
        if(password_verify($password,$passwordHash)){
            //create cookie to store username
            $_SESSION["username"] = $username;
            return true;
        }else{
            //return false if something failed
            return false;
        }

    }

    //method to destroy the cookie that was created when logging in
    public function logout(){
        //delete the cookie for username
        unset($_SESSION["username"]);
        return true;
    }

    //method to reset a user's password
    public function reset_password(){
        //get username and password from form and also get the new reset password
        $username = $_GET("username");
        $reset_password = $_GET("reset_password");
        //create a new hash for the password
        $rPasswordHash = hash($reset_password);
        //find username in db and set to new hash password
        $sql = "UPDATE users SET password=".$rPasswordHash." WHERE username=".$username;
        //execute sql
        $query = $this->dbConnection->query($sql);
        //return false if fail
        if (!$query)
            return false;
        //return true if successful
        else return true;


    }

}