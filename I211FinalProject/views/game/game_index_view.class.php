<?php
/*
 * Author: Jon Ross Richardson
 * Date: NOV 16 2022
 * Name: game_index_view.class.php
 * Description: the parent class that displays a search box.
 * The javascript varaiable media specifies the media type. This variable is needed for auto suggestion.
 */

class GameIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <nav class="border">
            <div class="upperNav fontSUIbold fontColorGRY ">
                <span class="fontSizeXLg">University Game Library</span>
                <div class="leftInfo">
                    <span class="fontSizeXSm">Today's Hours: 8:00am-11:00pm</span>
                    <!-- search bar here, add classes to  search inputs -->
                    <form method="get" action="<?= BASE_URL ?>/game/search">
                        <input class="searchBar" type="text" name="query-terms" id="searchtextbox" placeholder="Search games by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                        <button class="searchSubmit fontColorWHT" type="submit">
                            <i class="fa-solid fa-magnifying-glass" style="font-size: 18px;"></i></button>
                    </form>
                    <!-- end of search bar -->

                </div>
            </div>
            <div class="navbar fontColorWHT fontSUIbold">
                <div class="left">
                    <span>Welcome</span>
                </div>
                <div class="right">
                    <a href="<?= BASE_URL ?>/game/index" >Home</a>
                    <a href="<?= BASE_URL ?>/game/index#allGames">Games</a>
                    <a href="#">Profile</a>
                    <a href="#">History</a>
                    <a href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
        </nav>

        <!--create the search bar -->
        <!--Search bar will be moved to the nav bar-->
<!--        <div id="searchbar">-->
<!--            <form method="get" action="--><?//= BASE_URL ?><!--/game/search">-->
<!--                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search games by title" autocomplete="off" onkeyup="handleKeyUp(event)">-->
<!--                <input type="submit" value="Search" />-->
<!--            </form>-->
<!--            <div id="suggestionDiv"></div>-->
<!---->
<!--        </div>-->
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}