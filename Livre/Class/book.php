<?php

require_once("author.php");

class NegativePagesException extends Exception {};
class FutureYearException extends Exception {};
class NegativePriceException extends Exception {};

class Book
{
    private $_titre;
    private $_nbPages;
    private $_year;
    private $_price;
    private $_author;

    public function __construct($titre, $nbPages, $year, $price, Author $author)
    {
        $var = date("Y");
        try
        {
            if ($nbPages < 0)
                throw new NegativePagesException();
            else
                $this->_nbPages = $nbPages;
        }
        catch (NegativePagesException $expa)
        {
            $this->_nbPages = -($nbPages);
            echo "Number of pages in a book can't be negative. Input converted to positive number.<br />";
        }
        
        try
        {
            if ($year > $var)
                throw new FutureYearException();
            else
                $this->_year = $year;
        }
        catch (FutureYearException $exy)
        {
            $this->_year = $var;
            echo "Year of a book cannot be set in the future. Input converted to current year.<br />";
        }

        try
        {
            if ($price < 0)
                throw new NegativePriceException();
            else
                $this->_price = $price;
        }
        catch (NegativePriceException $expr)
        {
            $this->_price = -($price);
            echo "Price of a book can't be negative. Input converted to positive number.<br />";
        }
        finally
        {
            $this->_titre = $titre;
            $this->_author = $author;
            $author->addBook($this);
        }
    }

    public function __toString()
    {
        return $this->getTitre() . " (" . $this->getYear() . ") : " . $this->getNb() . " pages / " . $this->getPrice() . " €<br />";
    }

    public function getTitre()
    {
        return $this->_titre;
    }

    public function getNb()
    {
        return $this->_nbPages;
    }

    public function getYear()
    {
        return $this->_year;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }

    public function setNb($i)
    {
        try
        {
            if ($i < 0)
                throw new NegativePagesException();
            else
                $this->_nbPages = $i;
        }
        catch (NegativePagesException $ex)
        {
            $this->_nbPages = -($i);
            echo "Number of pages in a book can't be negative. Input converted to positive number.";
        }
        
    }

    public function setYear($i)
    {
        $var = date("Y");
        try
        {
            if ($i > $var)
                throw new FutureYearException();
            else
                $this->_year = $i;
        }
        catch (FutureYearException $ex)
        {
            $this->_year = $var;
            echo "Year of a book cannot be set in the future. Input converted to current year.";
        }
    }

    public function setPrice($i)
    {
        try
        {
            if ($i < 0)
                throw new NegativePriceException();
            else
                $this->_price = $i;
        }
        catch (NegativePriceException $ex)
        {
            $this->_price = -($i);
            echo "Price of a book can't be negative. Input converted to positive number.";
        }
    }

    public function setAuthor(Author $author)
    {
        $this->_author = $author;
    }
}

?>