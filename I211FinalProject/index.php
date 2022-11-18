<?php
/**
 * Author: Jon Ross Richardson and Jennifer Baldwin
 * Date: 11/10/2022
 * File: index.php
 * Description:
 */

//load application settings
require_once "application/config.php";

//load autoloader
require_once "vendor/autoload.php";

$game_controller= new GameController();

//load the dispatcher that dissects a request URL
new Dispatcher();