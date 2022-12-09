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

//                var_dump($obj);
//                die();

                //create a game object
                $user = new User(
                    stripslashes($obj->user_name),
                    stripslashes($obj->user_address),
                    stripslashes($obj->f_name),
                    stripslashes($obj->l_name),
                    stripslashes($obj->password),
                    stripslashes($obj->email),
                    stripslashes($obj->admin)
                );

                //set the id for the game
                $user->setUserId($obj->user_id);

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

    public function add_user(){

        try {
            //if the script did not receive post data, display an error message and then terminite the script immediately
            if (!filter_has_var(INPUT_POST, 'user_name') ||
                !filter_has_var(INPUT_POST, 'user_address') ||
                !filter_has_var(INPUT_POST, 'f_name') ||
                !filter_has_var(INPUT_POST, 'l_name') ||
                !filter_has_var(INPUT_POST, 'password') ||
                !filter_has_var(INPUT_POST, 'email')) {

                //throw error if fields are not correct
                throw new DataMissingException("Missing Game fields. All Game fields are required.");
            }

            //retrieve password, then remove white space, filter, and sanitize
            $pw = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            //function to hash the password
            $hash_pw = password_hash($pw, PASSWORD_DEFAULT);

            //retrieve all attributes from the user input form
            $username = filter_input(INPUT_POST, "user_name", FILTER_SANITIZE_NUMBER_INT);
            $address = filter_input(INPUT_POST, "user_address", FILTER_SANITIZE_STRING);
            $fName = filter_input(INPUT_POST, "fName", FILTER_SANITIZE_STRING);
            $lName = filter_input(INPUT_POST, "lName", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_NUMBER_FLOAT);
            $admin = 0;

            //construct an INSERT query
            $sql = "INSERT INTO " . $this->db->getUserTable() . "  SET f_name='$fName', user_name='$username', l_name='$lName', user_address='$address', password='$hash_pw', email='$email', admin= $admin";

//            $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES('$username', '$address', '$fName', '$lName', '$hash_pw', '$email', '$admin')";

            $query = $this->dbConnection->query($sql);

            if(!$query){
                throw new DatabaseExecutionException("Updating Game has failed from an execution error");
            }

            return $query;
        }catch(DataMissingException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }catch (DatabaseExecutionException $e){
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }

    }




}