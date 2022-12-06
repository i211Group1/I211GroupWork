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
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>IUPUI Game Rental</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
            <!-- Josh's css sheet-->
<!--                <link href="www/css/site_style.css" rel="stylesheet" type="text/css"/>-->

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
                <div class="dull">

                </div>


            </div>
            <div class="border headerMarg">
                <div class="trident"></div>
                <span class="fontSUIsemiLite fontColorWHT fontSizeXXL">IUPUI</span>
            </div>

        </header>

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
                    <p>Scholarshops</p>
                    <p>Art at the Library</p>
                    <p>Special Collections</p>
                </section>
                <section class="sub">
                    <p>Blah Blah Blah</p>
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
<!--                    <p>Josh Tuffnell</p>-->
                </section>
            </div>
        </footer>
<!--        <div id="footer">-->
<!--            <p>IUPUI 2022<br>Project Created by Luke Erny, Josh Tuffnell, John Ross Richardson, and Jennifer Baldwin.</p>-->
<!--        <br>-->
<!--        </body>-->
<!--        </div>-->
<!--        </html>-->
        <!--    footer view goes here    -->

        <?php
    }
}