<?php

class user
{
private $email;
private $password;
private $userName;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
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
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = sha1($password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $user
     * @return user
     */
    public function setUserName($user)
    {
        $this->userName = $user;
        return $this;
    }

    /**
     * user constructor.
     * @param $email
     * @param $password
     * @param $user
     */
    public function __construct($email, $password, $user)
    {
        $this->email = $email;
        $this->password = sha1($password);
        $this->userName = $user;
    }
}