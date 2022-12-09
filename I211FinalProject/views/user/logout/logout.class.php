<?php
/**
 *Name: Jennifer Baldwin
 *Date: 12/8/2022
 *File: logout.class.php
 *Description: define the logout class
 */

class Logout extends IndexView {

    public function display() {

        parent::displayHeader("Logged out");

        ?>
        <div class="border">
            <!--Display the message-->
            <p>You have been logged out.</p>
            <!--Display the links-->
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}