<?php
/**
 * Author: Luke Erny
 * Date: 11/10/2022
 * File: game_edit.class.php
 * Description: This class defines a method "display" and then the method accepts a Product object and displays the details of the product in a form to be edited.
 */

class GameEdit extends GameIndexView {
    public function display($game) {
        //display page header
        parent::displayHeader("Edit Game");

        //retrieve game details by calling get methods
        $game_id = $game->getGameId();
        $game_name = $game->getGameName();
        $genre = $game->getGenre();
        $publisher = $game->getPublisher();
        $description = $game->getDescription();
        $price = $game->getPrice();
        $playerMin = $game->getMaxPlayer();
        $playerMax = $game->getMinPlayer();
        $playTime = $game->getPlayTime();
        $image = $game->getImage();
        ?>

        <div id="main-header" class="border">Edit Game Details</div>

        <!-- display product details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/game/update/" . $game_id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $game_id ?>">

            <p><strong>Game</strong><br>
                <input name="game" type="text" size="100" value="<?= $game_name ?>" required autofocus></p>

            <p><strong>Genre</strong>:<br>
                <textarea name="genre" rows="8" cols="100"><?= $genre ?></textarea></p>

            <p><strong>Publisher</strong>:<br>
                <textarea name="publisher" rows="8" cols="100"><?= $publisher ?></textarea></p>

            <p><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100"><?= $description ?></textarea></p>

            <p><strong>Price</strong>:<br>
                <textarea name="price" rows="8" cols="100"><?= $price ?></textarea></p>

            <p><strong>Player Min</strong>:<br>
                <textarea name="player_Min" rows="8" cols="100"><?= $playerMin ?></textarea></p>

            <p><strong>Player Max</strong>:<br>
                <textarea name="player_max" rows="8" cols="100"><?= $playerMax ?></textarea></p>

            <p><strong>Play Time</strong>:<br>
                <textarea name="play_time" rows="8" cols="100"><?= $playTime ?></textarea></p>

            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>"></p>

            <input type="submit" name="action" value="Update Game">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/game/detail/" . $game_id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
}