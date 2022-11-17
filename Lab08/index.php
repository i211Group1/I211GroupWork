<?php

/*
 * Author: Luke Erny
 * Date: 11/9/2022
 * Name: index.php
 * Description: the homepage that presents users options for navigating to other application pages
 */

//include code in vendor/autoload.php file
//require_once ("vendor/autoload.php");

//create an object of UserController
//$user_controller="";
$user_controller = new UserController();

//add your code below this line to complete this file
if (isset($_GET['action'])) {
    $action = $_GET['action'];

}

//if(!$action){
//    $action = 'index';
//
//}

//display the index page
if ($action == "index") {
    $user_controller->index();
} elseif ($action == "register") {
    $user_controller->register();
} elseif ($action == "login") {
    $user_controller->login();
} elseif ($action == "verify") {
    $user_controller->verify();
} elseif ($action == "logout") {
    $user_controller->logout();
} elseif ($action == "reset") {
    $user_controller->reset();
} elseif ($action == "do_reset") {
    $user_controller->do_reset();
} elseif ($action == "error") {
    $message = "Unfortunately, an error has occured.";
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
    }
    $user_controller->error($message);
} else {
    $message = "Invalid action was selected.";
    $user_controller->error($message);
}