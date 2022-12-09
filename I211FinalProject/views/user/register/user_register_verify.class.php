<?php
/**
 *Name: Jennifer Baldwin
 *Date: 12/8/2022
 *File: user_register_verify.class.php
 *Description: define UserRegisterVerify class
 */

class UserRegisterVerify extends IndexView {

    public function display($message){
        //display page header
        parent::displayHeader("Account Created")
            ?>
        <div id="main-header">

        <?php

        //if account creation was successful display the corresponding message and links
        if ($message == true) {
            ?>
            <p>Your account has been created.</p>
            <span style="float: left">Proceed to <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <?php
            //if account creation was unsuccessful display the corresponding message and links
        } else {
            ?>
            <p>Your last attempt for creating an account failed. Please try again.</p>
            <span style="float: left">Still need to create an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <?php
        }
        ?>
        </div>

        <?php

        parent::displayFooter();
    }
}