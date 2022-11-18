<?php
/**
 * Author: Luke Erny
 * Date: 11/10/2022
 * File: game.class.php
 * Description: defines the game class
 */

class Game
{
    private $game_id, $game_name, $genre, $publisher, $description, $price, $image;

    public function __construct( $game_name, $genre, $publisher, $description, $price, $image)
    {
        $this->game_name = $game_name;
        $this->genre = $genre;
        $this->publisher = $publisher;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }


    /** Getters */

    //get game_id
    public function getGameId()
    {
        return $this->game_id;
    }

    // get the Game Name
    public function getGameName()
    {
        return $this->game_name;
    }

    // get the Genre
    public function getGenre()
    {
        return $this->genre;
    }

    // get publisher
    public function getPublisher()
    {
        return $this->publisher;
    }

    //get description
    public function getDescription()
    {
        return $this->description;
    }

    //get price
    public function getPrice()
    {
        return $this->price;
    }

    //get image
    public function getImage()
    {
        return $this->image;
    }




    /** Setters */

    //set the game ID
    public function setGameId($game_id)
    {
        $this->game_id = $game_id;
    }

    // set the Game Name
    public function setGameName($game_name)
    {
        $this->game_name = $game_name;
    }

    // set the Genre

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    //set publisher
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    //set description
    public function setDescription($description)
    {
        $this->description = $description;
    }

    //set price
    public function setPrice($price)
    {
        $this->price = $price;
    }

    // set image
    public function setImage($image)
    {
        $this->image = $image;
    }

}