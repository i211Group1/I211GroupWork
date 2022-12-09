<?php
/**
 *Name: Jennifer Baldwin
 *Date: 12/8/2022
 *File: user_login_verify.class.php
 *Description: define UserLoginVerify class
 */

class LoginVerify extends IndexView{

    public function display($message){

        //display page header
        parent::displayHeader("Login Success");

        //if the login was successful set user_id cookie
        if($message == true){
            $user_id = $_COOKIE['user_id'];
        }
        ?>
        <div class="border">
        <p>You have successfully logged in.</p>
        </div>

            <?php
            parent::displayFooter();

    }
}