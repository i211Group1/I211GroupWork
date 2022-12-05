<?php
/**
 * Author: Jennifer Baldwin
 * Date: 11/10/2022
 * File: game_search.class.php
 * Description:
 */
class GameSearch extends GameIndexView{
    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($terms, $games) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($games)) ? "( 0 - 0 )" : "( 1 - " . count($games) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($games === 0) {
                echo "No game was found.<br><br><br><br><br>";
            } else {
                //display games in a grid; six games per row
                foreach ($games as $game) {
                    $id = $game->getGameID();
                    $title = $game->getGameName();
                    $genre = $game->getGenre();
                    $publisher = $game->getPublisher();
                    $price = $game->getPrice();
                    $image = $game->getImage();

                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . GAME_IMG . $image;
                    }

                    echo "<div class='grid-item'><p><a href='", BASE_URL, "/game/detail/$id'><img src='" . $image .
                        "'></a><span><br>$title<br>Publisher: $publisher<br>" ."Retail:". $price . "<br>Genre: ". $genre ."</span></p></div>";

                }
            }
            ?>
        </div>
        <a href="<?= BASE_URL ?>/movie/index">Go to movie list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}