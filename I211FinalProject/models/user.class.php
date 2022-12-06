<?php
/**
 * Author: Jon Ross Richardson
 * Date: 11/10/2022
 * File: game_model.class.php
 * Description:
 */
class User
{
    //declare public variables
    private $user_id, $user_name, $user_address, $fName, $lName, $password, $email, $admin;

    public function __construct($userID,$userName,$userAddress,$firstName,$lastName, $userPassword,$userEmail,$adminPriv){
        $this->user_id = $userID;
        $this->user_name = $userName;
        $this->user_address = $userAddress;
        $this->fName = $firstName;
        $this->lName = $lastName;
        $this->password = $userPassword;
        $this->email = $userEmail;
        $this->admin = $adminPriv;
    }


    //Getters and setters for the class
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getUserAddress()
    {
        return $this->user_address;
    }

    /**
     * @param mixed $user_address
     */
    public function setUserAddress($user_address)
    {
        $this->user_address = $user_address;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }




}