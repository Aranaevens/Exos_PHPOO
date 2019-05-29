<?php

require_once("consult.php");
require_once("person.php");

class Dentist extends Person
{
    private $_consults;

    public function __construct($prenom, $nom)
    {
        parent::__construct($prenom, $nom);
        $this->_consults = array();
    }

    public function addConsult(Consultation $consult)
    {
        array_push($this->_consults, $consult);
    }

    public function afficherConsultations()
    {
        echo "<strong>Consultations de Dr. " . $this . "</strong><br />";
        foreach($this->_consults as $i)
        {
            echo $i->dateFormatted() . " avec " . $i->getPatient() . "<br />";
        }
    }
}

?>