<?php
/*
 * Author: Jon Ross Richardson
 * Date:
 * Name: game_index.class.php
 * Description: This class defines a method called "display", which displays all movies.
 */
class GameIndex extends GameIndexView {
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($games) {
        //display page header
        parent::displayHeader("List of Games");

        ?>
        <div id="main-header"> Games in the Library</div>

        <div class="grid-container">
            <?php
            if ($games === 0) {
                echo "No Game was found.<br><br><br><br><br>";
            } else {
                //display games in a grid; six games per row
                foreach ($games as $game) {
                    $id = $game->getGameId();
                    $title = $game->getGameName();
                    //$genre = $game->getGenre();
                    $publisher = $game->getPublisherId();
                    //$release_date = new \DateTime($game->getRelease_date());
                    $price = $game->getPrice();
                    $image = $game->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . GAME_IMG . $image;
                    }

                    echo "<div class='item'><p><a href='", BASE_URL, "/game/detail/$id'><img src='" . $image .
                        "'></a><span>$title<br>Publisher $publisher<br>" . $price . "</span></p></div>";

                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}
