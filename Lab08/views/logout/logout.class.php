<?php
/**
 * Author: Josh Tuffnell
 * Date: 11/10/22
 * File: logout.class.php
 * Description:
 */
class Logout extends View {
    public function display(){
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Logout</div>
        <div class="middle-row">You have successfully logged out.</div>
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