<?php
/**
 * Author: Luke Erny and Jennifer Baldwin
 * Date: 11/10/2022
 * File: game_controller.class.php
 * Description: the game controller
 */

class GameController {
    private $game_model;

    //constructor
    public function __construct() {
        // create an instance of the GameModel class
        $this->game_model = new GameModel();
    }


    // index action that displays all board games
    public function index() {
        // retrieve all board games and store them in an array
        $games = $this->game_model->list_games();

        // display the products
        $view = new GameIndex();
        $view->display($games);
    }

    //show details of a game
    public function detail($id) {
        //retrieve the specific game
        $game = $this->game_model->view_game($id);

        if(!$game){
            //display an error
            $message= "there was a problem display the game id='". $id. "'.";
            $this->error($message);
        }

        //display movie details
        $view = new GameDetail();
        $view->display($game);
    }
    public function error($message){
        //create an object of the Error Class
        $error = new GameError();

        //display the error page
        $error->display($message);
    }

}