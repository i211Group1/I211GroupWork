<?php
/**
 * Author: Luke Erny and Jennifer Baldwin
 * Date: 11/10/2022
 * File: config.php
 * Description: set application settings
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "/I211GroupWork/I211FinalProject");

/*************************************************************************************
 *                       settings for products                                         *
 ************************************************************************************/

//define default path for media images
define("GAME_IMG", "www/img/games/");