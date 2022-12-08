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
    public function view_user($user_id)
    {
        //the select sql statement
//        $sql = "SELECT * FROM " . $this->tblGame . "," . $this->tblGameGenre .
//            " WHERE " . $this->tblGame . ".genre_id=" . $this->tblGameGenre . ".genre_id" .
//            " AND " . $this->tblGame . "id='$id'";

        //sample SQL
        $sql = "SELECT * FROM user WHERE user_id = " . $user_id;

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                //return false;
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");

            if ($query && $query->num_rows > 0) {

                $obj = $query->fetch_object();

                //create a game object
                $user = new User(
                    stripslashes($obj->userName),
                    stripslashes($obj->userAddress),
                    stripslashes($obj->firstName),
                    stripslashes($obj->lastName),
                    stripslashes($obj->userPassword),
                    stripslashes($obj->userEmail),
                    stripslashes($obj->adminPriv)
                );

                //set the id for the game
                $user->setUserId($obj->userID);

                return $user;
            }


            return false;
        }catch(DatabaseExecutionException $e){
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }
    }




}