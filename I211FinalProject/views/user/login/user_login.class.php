<?php
/**
 *Name: Jennifer Baldwin
 *Date: 12/8/2022
 *File: user_login.class.php
 *Description: Define the UserLogin class
 */
class UserLogin extends IndexView{

    public function display(){

        //display page header
        parent::displayHeader("Create Account");

        ?>
        <div id="login" class="border">
            <p class="">Sign in</p>

            <form action="<?= BASE_URL ?>/user/login_verify" method="post">

                <div class="wrapper">
                    <label for="username">Username</label>
                    <input name="user_name" type="text" required>
                </div>
                <div class="wrapper">
                    <label for="password">Password</label>
                    <input type='password' name='password' required>
                </div>

                <input id="submit" type="submit" name="Submit"  value="Login"/>
            </form>
            <p class="">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Create One!</a></p>
        </div>
<?php
        //display page footer
        parent::displayFooter();
    }
}