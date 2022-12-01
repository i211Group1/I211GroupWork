<?php
/**
 * Author: Luke Erny and Josh Tuffnell
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
            <!-- Josh's css sheet-->
                <link href="www/css/site_style.css" rel="stylesheet" type="text/css"/>
            <!-- Jennifer's scss stylesheet-->
            <!--    <link href="www/css/styles.css" rel="stylesheet" type="text/css"/>-->
        </head>
        <body>
        <!--    header view goes here    -->


        <?php
    }
    static public function displayFooter()
    {

        ?>
        </body>
        </html>
        <!--    footer view goes here    -->
        <?php
    }
}