<?php
/**
 * Author: Jennifer Baldwin and Josh Tuffnell
 * Date: 11/10/2022
 * File: game_detail.class.php
 * Description: definition for GameDetail class
 */

class GameDetail extends GameIndexView {

    public function display($game){

        //display page header
        parent::displayHeader("Game Details");

        //retrieve game details
        $id = $game->getGameId();
        $title = $game->getGameName();
        $genre = $game->getGenre();
        $publisher = $game->getPublisher();
//        $price = $game->getPrice();
        $minPlayer = $game->getMinPlayer();
        $maxPlayer = $game->getMaxPlayer();
        $playTime = $game->getPlayTime();
        $description = $game->getDescription();
        $image = $game->getImage();


?>



        <section class="border gameDetails fontColorBLK">
            <div class="left">
                <h1 class="fontSUIbold"><?php echo $title ?></h1>
                <?php echo"<img src='" . $image . "' alt='gamebox of " . $title . "'>" ?>

            </div>
            <div class="right">
                <form class="fontSUIreg" action="">
                    <div class="detail">
                        <label for="playTime">Playtime:</label>
                        <div class="gamedetail"><?php echo $playTime ?>min</div>
                    </div>
                    <div class="detail">
                        <label for="playerCount">Player count:</label>
                        <div class="gamedetail"><?php echo $minPlayer ?>-<?php echo $maxPlayer ?></div>
                    </div>
                    <div class="detail">
                        <label for="genre">Genre:</label>
                        <div class="gamedetail"><?php echo $genre ?></div>
                    </div>
                    <div class="detail">
                        <label for="publisher">Publisher:</label>
                        <div class="gamedetail"><?php echo $publisher ?></div>
                    </div>
                    <div class="detail">
                        <label for="descripttion">Description:</label>
                        <div class="gamedetail"><?php echo $description ?></div>
                    </div>
                    <div class="options">
                        <input type="button" id="editBtn" class="fontSUIbold fontColorWHT" value="Edit" onclick="window.location.href = '<?= BASE_URL ?>/game/edit/<?= $id ?>'">
                    </div>

                </form>
                <a href="<?= BASE_URL ?>/game/index" class="fontSUIbold fontColorGRY">back to home page</a>

            </div>
        </section>
<?php
    }
}
