<?php
/**
 *Name: Jennifer Baldwin
 *Date: 12/8/2022
 *File: user_register.class.php
 *Description: define UserRegister class
 */
class UserRegister extends IndexView{

    public function display(){

        //display page header
        parent::displayHeader("Create Account");
?>
        <div id="signup" class="border accInfo">
            <p class="p-title">Create Account</p>

            <form action="register.php" method="post">
                <div class="name-wrapper">
                    <div class="input-wrapper">
                        <label for="first_name">First Name</label>
                        <input class="login-field" name="first_name" type="text" required>
                    </div>
                    <div class="input-wrapper">
                        <label for="last_name">Last Name</label>
                        <input class="login-field" name="last_name" type="text" required>
                    </div>
                </div>
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type='password' name='password' class="login-field" required>
                </div>
                <div class="input-wrapper">
                    <label for="user_email">Email</label>
                    <input class="login-field" name="user_email" type="email" required>
                </div>
                <div class="input-wrapper">
                    <label for="address">Address</label>
                    <input class="login-field" name="address" type="text" required>
                </div>
                <div class="cityState-wrapper">
                    <div class="input-wrapper city">
                        <label for="city_name">City</label>
                        <input class="login-field" name="city_name" type="text" required>
                    </div>
                    <div class="input-wrapper state">
                        <label for="state">State</label>
                        <input class="login-field" name="state" type="text" required>
                    </div>
                </div>

                <input id="submit" type="submit" onclick="window.location.href ='register.php'" value="Sign Up"/>
            </form>
            <p class="p-textLarge">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login!</a></p>
        </div>
<?php
        //display page footer
        parent::displayFooter();
    }
}