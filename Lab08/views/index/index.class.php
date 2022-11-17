<?php
/**
 * Author: Josh Tuffnell and Jennifer Baldwin
 * Date: 11/10/22
 * File: index.class.php
 * Description: view file for application homepage
 */
class Index extends View {
    public function display(){
        //call the header method defined in the parent class to add the header
        parent::header();
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="top-row">Create An Account</div>
        <div class="middle-row">Please complete the entire form. All fields are required.</div>
        <form method="post" action="index.php">
            <input id="username" type="text" name="Username" required="required" placeholder="Username">
            <input id="password" type="password" name="Password" required="required" placeholder="Password, 5 characters minimum">
            <input id="email" type="email" name="Email" required="required" placeholder="Email">
            <input id="fName" type="text" name="First Name" required="required" placeholder="First Name">
            <input id="lName" type="text" name="Last Name" required="required" placeholder="Last Name">

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