<?php
/**
 * Author: Josh Tuffnell
 * Date: 11/10/22
 * File: login.class.php
 * Description: view file for displaying the login form
 */
class Login extends View {
    public function display(){
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Login</div>

        <form method="post" action="index.php">
            <input type="text" name="Username" required="required" placeholder="Username">
            <input type="password" name="Password" required="required" placeholder="Password, 5 characters minimum">

            <input type="submit" name="submit" value="Register">
        </form>
        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
        </div>
        <!-- page specific content ends -->
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}