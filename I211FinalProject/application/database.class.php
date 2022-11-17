<?php
/**
 * Author: Luke Erny
 * Date: 11/10/2022
 * File: database.class.php
 * Description: the database class sets the details of the database
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'boardGame_db',
        'tblCheckOutItems' => 'check_out_items',
        'tblGenre' => 'genre_tbl',
        'tblInventoryGames' => 'inventory_games',
        'tblPublisher' => 'publisher',
        'tblTransaction' => 'transaction',
        'tblUser' => 'user',
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores the checkout items
    public function getCheckOutItemsTable() {
        return $this->param['tblCheckOutItems'];
    }

    //returns the name of the table that stores the products
    public function getGenreTable() {
        return $this->param['tblGenre'];
    }

    //returns the name of the table storing the product condition
    public function getInventoryGamesTable() {
        return $this->param['tblInventoryGames'];
    }

    //returns the name of the table storing the product types
    public function getPublisherTable() {
        return $this->param['tblPublisher'];
    }

    //returns the name of the table storing the product types
    public function getTransactionTable() {
        return $this->param['tblTransaction'];
    }

    //returns the name of the table storing the product types
    public function getUserTable() {
        return $this->param['tblUser'];
    }
}