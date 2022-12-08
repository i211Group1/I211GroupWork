<?php
/**
 * Author: Jennifer Baldwin
 * Date: 11/10/2022
 * File: game_search.class.php
 * Description:
 */
class GameSearch extends IndexView{
    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($terms, $games) {
        //display page header
        parent::displayHeader("Search Results");
        ?>

        <section class="border searchResults">
            <h1 class="searchFieldHader fontColorGRY fontSUIreg">Search results for "<?=$terms?>":</h1>
            <div class="searchField">
                <?php
                if ($games === 0) {
                    echo "No Game was found.<br><br><br><br><br>";
                } else {
                    //display games in a grid; six games per row
                    foreach ($games as $game) {
                        $id = $game->getGameID();
                        $title = $game->getGameName();
//                    $genre = $game->getGenre();
//                    $publisher = $game->getPublisher();
                        $minPlayer = $game->getMinPlayer();
                        $maxPlayer = $game->getMaxPlayer();
                        $playTime = $game->getPlayTime();
//                    $price = $game->getPrice();
                        $image = $game->getImage();

                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . GAME_IMG . $image;
                        }

                        echo"   <div class='gamebox'>
                                <a href='", BASE_URL, "/game/detail/$id'>
                                    <img src='".$image."' alt='image of ". $title ."'>
                                    <div class='gameInfo fontSUIreg fontColorBLK'>
                                        <h1 class=' fontSizeMed'>$title</h1>
                                        <div class='playInfo fontSizeXSm'>
                                            <div class='playTime'>$playTime min</div>
                                            <div class='playerCount'>$minPlayer-$maxPlayer players</div>
                                        </div>
                                    </div>
                                </a>
                            </div>";

                    }
                }
                ?>
            </div>
        </section>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}