<?php
/**
 * Author: Jennifer Baldwin and Josh Tuffnell
 * Date: 11/10/2022
 * File: game_detail.class.php
 * Description: definition for GameDetail class
 */

class GameDetail extends GameIndexView {

//    private $game;
//
//    public function __construct($game){
//        $this->game = $game;
//    }
    public function display($game, $confirm){

        //display page header
        parent::displayHeader("Game Details");

        //retrieve game details
        $id = $game->getGameId();
        $title = $game->getGameName();
        $genre = $game->getGenre();
        $publisher = $game->getPublisher();
        $price = $game->getPrice();
        $minPlayer = $game->getMinPlayer();
        $maxPlayer = $game->getMaxPlayer();
        $playTime = $game->getPlayTime();
        $description = $game->getDescription();
        $image = $game->getImage();

        echo "$id";

?>
        <div id="main-header"> <?php echo $title ?></div>

        <?php echo "<div class='item'><p><a href='", BASE_URL, "/game/detail/$id'><img src='" . $image .
                        "'></a><span><br>$title<br>Publisher: $publisher<br>" ."Retail:". $price . "<br>Genre: ". $genre ."</span></p></div>";
?>
<!--            con-->


        <a href="<?= BASE_URL ?>/game/index">Go to game list</a>
<?php
    }
}