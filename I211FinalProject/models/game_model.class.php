<?php
/**
 * Author: Jon Ross Richardson and Jennifer Baldwin
 * Date: 12/6/2022
 * File: game_model.class.php
 * Description:
 */

class GameModel
{
    /**
     * @var
     */
    private static $_instance;

    //private data members
    private $db;
    private $dbConnection;
    private $tblGame;
    private $tblGameGenre;

    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblGame = $this->db->getInventoryGamesTable();
        $this->tblGameGenre = $this->db->getGenreTable();
        $this->tblGamePublisher = $this->db->getPublisherTable();


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //static method to ensure there is just one MovieModel instance
    public static function getGameModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new GameModel();
        }
        return self::$_instance;
    }

    /*
     * the list_movie method retrieves all movies from the database and
     * returns an array of Movie objects if successful or false if failed.
     * Movies should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_games()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

//        $sql = "SELECT * FROM " . $this->tblGame . "," . $this->tblGameGenre .
//            " WHERE " . $this->tblGame . ".genre_id=" . $this->tblGameGenre . ".genre_id";

        $sql = "SELECT * FROM inventory_games";

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return error message.
            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL statement.");
            }

            //if the query succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned movies
            $games = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $game = new Game(
                stripslashes($obj->game_name),
                stripslashes($obj->genre),
                stripslashes($obj->publisher),
                stripslashes($obj->description),
                stripslashes($obj->minPlayer),
                stripslashes($obj->maxPlayer),
                stripslashes($obj->playTime),
                stripslashes($obj->image)
            );
            //set the id for the game
            $game->setGameId($obj->game_id);

                //add the movie into the array
                $games[] = $game;
            }
            return $games;
        } catch (DatabaseExecutionException $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        }
    }

    /*
     * the viewMovie method retrieves the details of the movie specified by its id
     * and returns a movie object. Return false if failed.
     */

    public function view_game($id)
    {
        //the select sql statement
//        $sql = "SELECT * FROM " . $this->tblGame . "," . $this->tblGameGenre .
//            " WHERE " . $this->tblGame . ".genre_id=" . $this->tblGameGenre . ".genre_id" .
//            " AND " . $this->tblGame . "id='$id'";

        //sample SQL
        $sql = "SELECT * FROM inventory_games
        
        WHERE game_id = " . $id;

        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                //return false;
                throw new DatabaseExecutionException("Error encountered when executing the SQL query");

            if ($query && $query->num_rows > 0) {

                $obj = $query->fetch_object();

                //create a game object
                $game = new Game(
                    stripslashes($obj->game_name),
                    stripslashes($obj->genre),
                    stripslashes($obj->publisher),
                    stripslashes($obj->description),
                    stripslashes($obj->minPlayer),
                    stripslashes($obj->maxPlayer),
                    stripslashes($obj->playTime),
                    stripslashes($obj->image)
                );

                //set the id for the game
                $game->setGameId($obj->game_id);



                return $game;
            }


            return false;
        }catch(DatabaseExecutionException $e){
            $view = new GameError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        }
    }

    //search the database for games that match words in titles. Return an array of games if successful; false otherwise.
    public function search_game($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblGame . "," . $this->tblGameGenre .
            " WHERE " . $this->tblGame . ".genre_id=" . $this->tblGameGenre . ".genre_id AND (1";


        foreach ($terms as $term) {
            $sql .= " AND game_name LIKE '%" . $term . "%'";
        }

        $sql .= ")";
        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // the search failed, return false.
            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL statement.");
            }
            //search succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //search succeeded, and found at least 1 movie found.
            //create an array to store all the returned movies
            $games = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $game = new Game(
                    $obj->game_name,
                    $obj->genre_id,
                    $obj->publisher_id,
                    $obj->description,
                    $obj->minPlayer,
                    $obj->maxPlayer,
                    $obj->playTime,
                    $obj->image);

            //set the id for the game
            $game->setGameId($obj->game_id);

                //add the movie into the array
                $games[] = $game;
            }
            return $games;
        }catch (DatabaseExecutionException $e){
            $view = new GameError();
            $view->display($e->getMessage());
        }catch (Exception $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        }
    }


    public function update_game($id)
    {
        try {
            //if the script did not receive post data, display an error message and then terminite the script immediately
            if (!filter_has_var(INPUT_POST, 'game_id') ||
                !filter_has_var(INPUT_POST, 'game_name') ||
                !filter_has_var(INPUT_POST, 'genre') ||
                !filter_has_var(INPUT_POST, 'publisher') ||
                !filter_has_var(INPUT_POST, 'minPlayer') ||
                !filter_has_var(INPUT_POST, 'maxPlayer') ||
                !filter_has_var(INPUT_POST, 'playTime') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'description')) {

                //throw error if fields are not correct
                throw new DataMissingException("Missing Game fields. All Game fields are required.");
            }

            //retrieve data for the new game; data are sanitized and escaped for security.
            $game_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'game_name', FILTER_SANITIZE_STRING)));
            $genre = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING)));
            $publisher = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'publisher', FILTER_DEFAULT));
            $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
            $minPlayer = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'minPlayer', FILTER_SANITIZE_STRING)));
            $maxPlayer = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'maxPlayer', FILTER_SANITIZE_STRING)));
            $playTime = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'playTime', FILTER_SANITIZE_STRING)));
            $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));


            //query string for update
            $sql = "UPDATE " . $this->tblGame .
                " SET game_name='$game_name', genre='$genre', publisher='$publisher', description='$description',  minPlayer='$minPlayer',  maxPlayer='$maxPlayer',  playTime='$playTime', "
                . " image='$image' WHERE id='$id'";

            //execute the query
            //return $this->dbConnection->query($sql);

            $query = $this->dbConnection->query($sql);

            if(!$query){
                throw new DatabaseExecutionException("Updating Game has failed from an execution error");
            }

            return $query;
        }catch(DataMissingException $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        }catch (DatabaseExecutionException $e){
            $view = new GameError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new GameError();
            $view->display($e->getMessage());
        }
    }


}

