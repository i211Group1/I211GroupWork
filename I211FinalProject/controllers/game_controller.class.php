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

        // display the games
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
        $view = new GameDetail($game);
        $view->display($game);
    }
    public function error($message){
        //create an object of the Error Class
        $error = new GameError();

        //display the error page
        $error->display($message);
    }

    // search board games
    public function search() {
        //retrieve query terms from the search form
        $query_terms = trim($_GET['query-terms']);

        //if search is empty display all games
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching board games
        $item = $this->game_model->search_game($query_terms);

        if ($item == false) {
            //handle error
            $message = "No games were found matching your search term.";
            $this->error($message);
            return;
        }

        //display matched games
        $search = new GameSearch();
        $search->display($query_terms, $item);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $games = $this->game_model->search_game($query_terms);

        //retrieve all game titles and store them in an array
        $game = array();
        if ($games) {
            foreach ($games as $game) {
                $item[] = $game->getGame();
            }
        }

        echo json_encode($game);
    }

    public function edit($game_id) {
        //retrieve the specific game
        $game = $this->game_model->view_game($game_id);

        if (!$game) {
            //display error
            $message = "There was an issues displaying the game id='". $game_id . "'.";
            $this->error($message);
            return;
        }

        $view = new GameEdit();
        $view->display($game);
    }

    //update a game in the database
    public function update($game_id) {
        //update the game
        $update = $this->game_model->update_game($game_id);
        if (!$update) {
            //handle the error
            $message = "There was a problem updating the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }

        //display the updated game details
        $confirm = "The game was updated successfully.";
        $item = $this->game_model->view_game($game_id);

        $view = new GameDetail($game_id);
        $view->display($item, $confirm);
    }
}