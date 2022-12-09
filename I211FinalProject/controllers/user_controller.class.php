<?php
/**
 *Name: Jennifer Baldwin and Jon Ross Richardson
 *Date: 12/8/2022
 *File: user_controller.class.php
 *Description: the user controller
 */


class UserController{

    private $user_model;

    //constructor
    public function __construct()
    {
        // create an instance of the GameModel class
        $this->user_model = new UserModel();
    }

    //show details of a game
    public function detail($user_id) {
        //retrieve the specific user
        $user = $this->user_model->view_user($user_id);

        if(!$user){
            //display an error
            $message= "there was a problem displaying the user id='". $user_id. "'.";
            $this->error($message);
        }

        //display movie details
        $view = new UserDetail();
        $view->display($user);
    }

    //show error message
    public function error($message){
        //create an object of the Error Class
        $error = new UserError();

        //display the error page
        $error->display($message);
    }

    //show register page
    public function register(){
        //display movie details
        $view = new UserRegister();
        $view->display();
    }

    //create user account
    public function  register_verify(){

        $result = $this->user_model->add_user();

        if(!$result){
            $message = "There was a problem creating your account.";
            $this->error($message);
            return;
        }

        $view = new UserRegisterVerify();
        $view->display($result);
    }

    //show login page
    public function login(){
        //display movie details
        $view = new UserLogin();
        $view->display();
    }

}