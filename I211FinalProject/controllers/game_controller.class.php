<?php
/**
 * Author: Luke Erny
 * Date: 11/10/2022
 * File: game_controller.class.php
 * Description: the game controller
 */

class GameController {
    private $game_model;

    //constructor
    public function __construct() {
        // create an instance of the GameModel class
        $this->game_model = GameModel::getGameModel();
    }

    // index action that displays all board games
    public function index() {
        // retrieve all board games and store them in an array
        $games = $this->game_model->list_movies();

        // display the products
        $view = new GameIndex();
        $view->display($games);
    }

    //show details of a game
    public function detail($game_id) {
        //retrieve the specific game
        $games = $this->game_model->view_game($game_id);

        //display movie details
        $view = new GameDetail();
        $view->display($games);
    }
}