<?php
/**
 * Author: Luke Erny
 * Date: 11/10/2022
 * File: game.class.php
 * Description: defines the game class
 */

class Game
{
    private $game_id, $game_name, $genre_id, $publisher_id, $description, $price, $image;

    public function __construct($game_name, $genre_id, $publisher_id, $description, $price, $image)
    {
        $this->game_name = $game_name;
        $this->genre_id = $genre_id;
        $this->publisher_id = $publisher_id;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * get the game ID
     */
    public function getGameId()
    {
        return $this->game_id;
    }

    /**
     * set the game ID
     */
    public function setGameId($game_id)
    {
        $this->game_id = $game_id;
    }

    /**
     * get the Game Name
     */
    public function getGameName()
    {
        return $this->game_name;
    }

    /**
     * set the Game Name
     */
    public function setGameName($game_name)
    {
        $this->game_name = $game_name;
    }

    /**
     * get the Genre ID
     */
    public function getGenreId()
    {
        return $this->genre_id;
    }

    /**
     * set the Genre ID
     */
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    /**
     * get the Publisher ID
     */
    public function getPublisherId()
    {
        return $this->publisher_id;
    }

    /**
     * set the publisher ID
     */
    public function setPublisherId($publisher_id)
    {
        $this->publisher_id = $publisher_id;
    }

    /**
     * get the Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set the Description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * get the Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * set the Price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * get the Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * set the Image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}