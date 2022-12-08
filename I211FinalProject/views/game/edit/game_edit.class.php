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



        <!-- display product details in a form -->
        <!--<form class="new-media"  action='<?/*= BASE_URL . "/game/update/" . $game_id */?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">

            <p><strong>Game</strong><br>
                <input name="game" type="text" size="100" value="<?/*= $game_name */?>" required autofocus></p>

            <p><strong>Genre</strong>:<br>
                <textarea name="genre" rows="8" cols="100"><?/*= $genre */?></textarea></p>

            <p><strong>Publisher</strong>:<br>
                <textarea name="publisher" rows="8" cols="100"><?/*= $publisher */?></textarea></p>

            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?/*= $description */?></textarea></p>

            <p><strong>Player Min</strong>:<br>
                <textarea name="player_Min" rows="8" cols="100"><?/*= $playerMin */?></textarea></p>

            <p><strong>Player Max</strong>:<br>
                <textarea name="player_max" rows="8" cols="100"><?/*= $playerMax */?></textarea></p>

            <p><strong>Play Time</strong>:<br>
                <textarea name="play_time" rows="8" cols="100"><?/*= $playTime */?></textarea></p>

            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?/*= $image */?>"></p>

            <input type="submit" name="action" value="Update Game">
            <input type="button" value="Cancel" onclick='window.location.href = "<?/*= BASE_URL . "/game/detail/" . $game_id */?>"'>
        </form>
        --><?php
        //display page footer
        parent::displayFooter();
    }
}