<?php
/**
 *Name: Jennifer Baldwin and Jon Ross Richardson
 *Date: 12/8/2022
 *File: user_controller.class.php
 *Description: the user controller
 */


class UserController
{
    private $user_model;

    //constructor
    public function __construct()
    {
        // create an instance of the GameModel class
        $this->user_model = new userModel();
    }
    public function detail($user_id) {
        //retrieve the specific game
        $user = $this->user_model->view_user($user_id);

        if(!$user){
            //display an error
            $message= "there was a problem displaying the user id='". $user_id. "'.";
            $this->error($message);
        }

        //display movie details
        $view = new UserDetail($user);
        $view->display($user);
    }



}