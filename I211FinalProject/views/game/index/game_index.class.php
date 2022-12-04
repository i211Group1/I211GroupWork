<?php
/*
 * Author: Jon Ross Richardson and Jennifer Baldwin
 * Date:
 * Name: game_index.class.php
 * Description: This class defines a method called "display", which displays all games.
 */
class GameIndex extends GameIndexView {
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */


    public function display($games) {
        //display page header
        parent::displayHeader("Home");

        ?>
        <section class="border homeContent">
            <div class="hero">
                <div class="heroHeader fontSUIbold fontColorWHT">
                    <h1 class="fontSizeMax">BORED?</h1>
                    <h2 class="fontSizeMaxSmol">Search our board collection</h2>
                </div>
                <form>
                    <input class="searchBar" type="text">
                    <button class="searchSubmit fontColorWHT" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 18px;"></i></button>
                </form>

            </div>
        <div id="main-header">All Games:</div>

        <div class="grid-container">
            <?php
            if ($games === 0) {
                echo "No Game was found.<br><br><br><br><br>";
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
        </section>


        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}
