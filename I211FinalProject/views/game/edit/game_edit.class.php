<?php
//*
// * Author: Luke Erny
// * Date: 11/10/2022
// * File: game_edit.class.php
// * Description: This class defines a method "display" and then the method accepts a Product object and displays the details of the product in a form to be edited.
// *

class GameEdit extends IndexView {
    public function display($game) {
        //display page header
        parent::displayHeader("Edit Game");

        //retrieve game details by calling get methods
        $game_id = $game->getGameId();
        $game_name = $game->getGameName();
        $genre = $game->getGenre();
        $publisher = $game->getPublisher();
        $description = $game->getDescription();
        $minPlayer = $game->getMinPlayer();
        $maxPlayer = $game->getMaxPlayer();
        $playTime = $game->getPlayTime();
        $image = $game->getImage();
        ?>



        <section class="border gameEdit fontColorBLK">
            <h1 class="fontSUIbold">Edit Game Details</h1>

<!--             display game details in a form-->

        <form class="fontSUIreg" action='<?= BASE_URL . "/game/update/" . $game_id ?>' method="post">
            <input type="hidden" name="game_id" value="<?= $game_id ?>">

            <div class="top">
                <div class="left">
                    <div class="detail">
                        <label for="playTime">Game Title:</label>
                        <input type="text"  name="game_name" value="<?= $game_name ?>">
                    </div>
                    <div class="detail">
                        <label for="playTime">Playtime:</label>
                        <input type="text"  name="playTime" value="<?= $playTime ?>">
                    </div>
                    <div class="detail">
                        <label for="playerCount">Player count:</label>
                        <div class="playerCount">
                            <input  name="minPlayer" value="<?= $minPlayer ?>" type="number">
                            <span>-</span>
                            <input  name="maxPlayer" value="<?= $maxPlayer ?>"type="number">
                        </div>
                    </div>
                    <div class="detail">
                        <label for="genre">Genre:</label>
                        <input type="text"  name="genre" value="<?= $genre ?>">
                    </div>
                    <div class="detail">
                        <label for="genre">Image: <i>url (http:// or https://) or local file including path and file extension</i></label>
                        <input name="image" type="text" size="100" required value="<?= $image ?>"></p>
                    </div>
                    <div class="detail">
                        <label for="publisher">Publisher:</label>
                        <input type="text" name="publisher" value="<?= $publisher ?>">
                    </div>
                </div>
                <div class="right">
                    <div class="detail">
                        <label for="descripttion">Description:</label>
                        <textarea type="text" name="description" ><?= $description?></textarea>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="options">
                    <input id="cancelBtn" class="fontSUIbold fontColorWHT" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/game/detail/" . $game_id ?>"'>
                    <input id="saveBtn" class="fontSUIbold fontColorWHT" type="submit" name="action" value="Update Game">
                </div>
            </div>
        </form>
        <a class="fontSUIbold fontColorGRY">back to home page</a>
        </section>

        <?php
        //display page footer
        parent::displayFooter();
    }
}