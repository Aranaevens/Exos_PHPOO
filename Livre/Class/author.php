<?php

require_once("book.php");

class Author{

    private $_firstName;
    private $_lastName;
    private $_biblio;

    public function __construct($prenom, $nom)
    {
        $this->_firstName = $prenom;
        $this->_lastName = $nom;
        $this->_biblio = array();
    }

    public function __toString()
    {
        return "<strong>" . $this->getfName() . " " . strtoupper($this->getlName()) . "</strong><br />";
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

    public function addBook(Book $book)
    {
        array_push($this->_biblio, $book);
    }

    public function afficherBibliographie()
    {
        echo "<h3><strong>Livres de " . $this . "</strong></h3>";
        foreach($this->_biblio as $i)
        {
            echo $i;
        }
    }
}

?>