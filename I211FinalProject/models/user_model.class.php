<?php
/**
 * Author: Jon Ross Richardson and Jennifer Baldwin
 * Date: 12/6/2022
 * File: game_model.class.php
 * Description:
 */
class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    private $tblUser;
    private $tblTransaction;
    private $tblCheckout;
    private static $_instance;

    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();
        $this->tblTransaction = $this->db->getTransactionTable();
        $this->tblCheckout = $this->db->getCheckOutItemsTable();


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }


    //static method to ensure there is just one MovieModel instance
    public static function getUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }



}