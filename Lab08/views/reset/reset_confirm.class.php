<?php
/**
 * Author: Josh Tuffnell
 * Date: 11/10/22
 * File: reset_confirm.class.php
 * Description: file to display confirmation message after resetting password
 */
class ResetConfirm extends View {
    public function display(){
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Reset Password</div>
        <div class="middle-row">You have successfully reset your password.</div>
        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: left">Cancel Password Reset? <a href="index.php?action=login">Login</a></span>
        </div>
        <!-- page specific content ends -->
        <?php
        //call the footer method defined in the parent class to add the footer
        parent::footer();
    }
}