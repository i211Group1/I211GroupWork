<?php
/**
 * Author: Luke Erny and Jennifer Baldwin
 * Date: 11/9/2022
 * File: user_controller.class.php
 * Description: controller for the user model
 */

class UserController {
    private $user_model;

    //constructor
    public function __construct() {
        //creates an instance of the user_model class
        $this->user_model = UserModel::getUserModel();
    }

    //display the registration form
    public function index() {
        //index action that displays the registration form
        $view = new Index();
        $view->display();
    }

    //register the user by creating a user account and storing it in the database
    public function register() {
        $result = $this->user_model->add_user();

        //display result
        $view = new Register();
        if($result == true){
            $view->display();

        }
    }

    //display the login form
    public function login() {
        $view = new Login();
        $view->display();
    }

    //verify username and password
    public function verify() {
        $result = $this->user_model->verify_user();

        //display results
        $view = new Verfiy();
        $view->display($result);
    }

    //log out a user from the application
    public function logout() {
        $result = $this->user_model->logout();

        //display results
        $view = new Logout();
        $view->display($result);
    }

    //display password reset form
    public function reset() {
        if (!isset($_COOKIE['user'])) {
            $this->error("To reset password, log in first.");
        } else {
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);

        }
    }

    //reset the password by updating database
    public function do_reset() {
        $result = $this->user_model->reset_password();

        //view results
        $view = new ResetConfirm();
        $view->display($result);
    }

    //display the error page
    public function error($message) {
        $view = new UserError($message);
        $view->display($message);
    }
}
