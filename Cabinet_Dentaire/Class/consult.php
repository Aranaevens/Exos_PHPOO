<?php

require_once("dentist.php");
require_once("patient.php");

$form = new IntlDateFormatter('fr_FR.UTF-8', IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
$GLOBALS['f'] = $form;
class InvalidTimeException extends Exception {};
class InvalidHourException extends Exception {};
class InvalidMinutesException extends Exception {};

class Consultation
{
    private $_date;
    private $_doc;
    private $_patient;

    public function __construct($date, $time, Patient $patient, Dentist $doc)
    {
        
        $hourToAdd = explode(":", $time);
        try
        {
            $dateToAdd = new DateTime($date);
            if ($dateToAdd)
                $this->_date = $dateToAdd;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            exit(1);
        }
        try
        {
            if (count($hourToAdd) != 2)
                throw new InvalidTimeException();
            else if ($hourToAdd[0] >= 24 || $hourToAdd[0] < 0)
                throw new InvalidHourException();
            else if ($hourToAdd[1] >= 60 || $hourToAdd[1] < 0)
                throw new InvalidMinutesException();
            else
                $this->_date->setTime($hourToAdd[0], $hourToAdd[1]);
        }
        catch (InvalidTimeException $ext)
        {
            echo "Invalid time. Usage: 'HH MM'";
            exit(1);
        }
        catch (InvalidHourException $ext)
        {
            echo "Invalid hour provided. Usage: HH between 00 and 23";
            exit(1);
        }
        catch (InvalidMinutesException $ext)
        {
            echo "Invalid minutes provided. Usage: MM between 00 and 59";
            exit(1);
        }
        $this->_doc = $doc;
        $this->_patient = $patient;
        $doc->addConsult($this);
        $patient->addConsult($this);
    }

    public function __toString()
    {
        return "Consultation de " . $this->getPatient() . " le " . $this->dateFormatted() . " auprès de Dr\." . $this->getDoc();
    }

    public function dateFormatted()
    {
        return $GLOBALS['f']->format($this->getDate());
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function getDoc()
    {
        return $this->_doc;
    }

    public function getPatient()
    {
        return $this->_patient;
    }

    public function setDate($date, $time)
    {
        $hourToAdd = explode(":", $hour);
        try
        {
            $dateToAdd = new DateTime($date);
            if ($dateToAdd)
                $this->_date = $dateToAdd;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            exit(1);
        }
        try
        {
            if (count($hourToAdd) != 2)
                throw new InvalidTimeException();
            else if ($hourToAdd[0] >= 24 || $hourToAdd[0] < 0)
                throw new InvalidHourException();
            else if ($hourToAdd[1] >= 60 || $hourToAdd[1] < 0)
                throw new InvalidMinutesException();
            else
                $this->_date->setTime($hourToAdd[0], $hourToAdd[1]);
        }
        catch (InvalidTimeException $ext)
        {
            echo "Invalid time. Usage: 'HH MM'";
            exit(1);
        }
        catch (InvalidHourException $ext)
        {
            echo "Invalid hour provided. Usage: HH between 00 and 23";
            exit(1);
        }
        catch (InvalidMinutesException $ext)
        {
            echo "Invalid minutes provided. Usage: MM between 00 and 59";
            exit(1);
        }
    }

    public function setDoc(Dentist $doc)
    {
        $this->_doc = $doc;
    }

    public function setPatient(Patient $patient)
    {
        $this->_patient = $patient;
    }
}

?>