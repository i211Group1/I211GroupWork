<?php
/**
 * Author: Luke Erny and Josh Tuffnell and Jennifer Baldwin
 * Date: 11/10/2022
 * File: index_view.class.php
 * Description: File that displays the header and footer for every page
 */

class IndexView
{

    //this method displays the page header
    static public function displayHeader($page_title)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //variables for a user’s login, name, and role
        $login = '';
        $name = '';
        $user_id = '';
        $role = 0;

        //if the user has logged in, retrieve login, name, role, and user_id.
        if (isset($_SESSION['login'])
            AND isset($_SESSION['name'])
            AND isset($_SESSION['role'])
            AND isset($_SESSION['user_id'])
        ) {}
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>IUPUI Game Rental</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
            <!-- Jennifer's scss stylesheet-->
            <link href="<?= BASE_URL ?>/www/css/styles.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
        <!--    header view goes here    -->
        <header>
            <div class="redFullWidth">
                <div class="bright"></div>
                <div class="dull"></div>
            </div>
            <div class="border headerMarg">
                <div class="trident"></div>
                <span class="fontSUIsemiLite fontColorWHT fontSizeXXL">IUPUI</span>
            </div>

        </header>

<!--        nav goes here           -->
        <nav class="border">
            <div class="upperNav fontSUIbold fontColorGRY ">
                <span class="fontSizeXLg">University Game Library</span>
                <div class="leftInfo">
                    <span><a href="<?= BASE_URL ?>/user/login">Login</a> | <a href="<?= BASE_URL ?>/user/register">Register</a></span>
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
        <h1 class="border fontSUIreg fontColorGRY fontSizeXLg" style="margin-top: 20px;"><?=$page_title?></h1>


        <?php
    }
    static public function displayFooter()
    {

        ?>
        <footer class="border fontSUIreg fontColorWHT">
            <div class="col">
                <section class="sub">
                    <p>University Library</p>
                    <p>(317)274-0469</p>
                    <p>755 W. Michigan Street<br>Indianapolis, IN 46202</p>
                </section>
                <section class="donations">
                    <div class="libLogo"></div>
                    <p>Donate to <br> University Library</p>
                </section>
            </div>
            <div class="col">
                <section class="sub">
                    <p>Scholarships</p>
                    <p>Art at the Library</p>
                    <p>Special Collections</p>
                </section>
                <section class="sub">
                    <p>Sponsors</p>
                    <p>Other Links</p>
                    <p>Related things</p>
                </section>
            </div>
            <div class="col">
                <section class="socials">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                </section>
                <section class="sub">
                    <h4>Special Thanks to:</h4>
                    <p>Luke Erny</p>
                    <p>John Ross Richardson</p>
                    <p>Jennifer Baldwin</p>
                    <p>Josh Tuffnell</p>
                </section>
            </div>
        </footer>


        <?php
    }
}