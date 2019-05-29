<?php

abstract class Person
{
    private $_firstName;
    private $_lastName;

    public function __construct($prenom, $nom)
    {
        $this->_firstName = $prenom;
        $this->_lastName = $nom;
    }

    public function __toString()
    {
        return $this->getfName() . " " . strtoupper($this->getlName());
    }

    public function getfName()
    {
        return $this->_firstName;
    }

    public function getlName()
    {
        return $this->_lastName;
    }

    public function setfName($prenom)
    {
        $this->_firstName = $prenom;
    }

    public function setlName($nom)
    {
        $this->_lastName = $nom;
    }
}

?>