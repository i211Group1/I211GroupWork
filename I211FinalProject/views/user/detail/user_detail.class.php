<?php
/**
 * Author: Jennifer Baldwin
 * Date: 11/10/2022
 * File: game_detail.class.php
 * Description: definition for GameDetail class
 */

class UserDetail extends UserIndexView {

    public function display($user){

        //display page header
        parent::displayHeader("Game Details");

        //retrieve game details
        $id = $user->getUserId();
        $userName = $user->getUserName();
        $address = $user->getUserAddress();
        $firstName = $user->getFName();
        $lastName = $user->getLName();
        $email = $user->getEmail();
//        $password = $user->getPassword();


?>



        <section class="border gameDetails fontColorBLK">
            <div class="left">
                <h1 class="fontSUIbold"><?php echo $firstName ?>'s Profile</h1>
                <img src="www/img/error.jpg"

            </div>
            <div class="right">
                <form class="fontSUIreg" action="">
                    <div class="detail">
                        <label for="playTime">Username:</label>
                        <div class="gamedetail"><?php echo $userName ?>min</div>
                    </div>
                    <div class="detail">
                        <label for="playerCount">Full name:</label>
                        <div class="gamedetail"><?php echo $firstName ?> <?php echo $lastName ?></div>
                    </div>
                    <div class="detail">
                        <label for="genre">Address:</label>
                        <div class="gamedetail"><?php echo $address ?></div>
                    </div>
                    <div class="detail">
                        <label for="genre">Email:</label>
                        <div class="gamedetail"><?php echo $email ?></div>
                    </div>
                    <div class="detail">
                        <label for="publisher">Password:</label>
                        <div class="gamedetail">************</div>
                    </div>
                    <div class="options">
                        <input type="button" id="editBtn" class="fontSUIbold fontColorWHT" value="Edit" onclick="window.location.href = '<?= BASE_URL ?>/user/edit/<?= $id ?>'">
                    </div>

                </form>
                <a href="<?= BASE_URL ?>/game/index" class="fontSUIbold fontColorGRY">back to home page</a>

            </div>
        </section>
<?php
    }
}
