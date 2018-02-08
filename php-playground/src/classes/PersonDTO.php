<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/02/2018
 * Time: 14:56
 */
class PersonDTO
{
    /**
     * @var string
     */
private $name;
    /**
     * @var string
     */
private $firstName;
    /**
     * @var integer
     */
private $age;

    /**
     * PersonDTO constructor.
     * @param $name
     * @param $firstName
     * @param $age
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return PersonDTO
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return PersonDTO
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return PersonDTO
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

}