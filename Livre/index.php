<?php

require_once("Class/author.php");
require_once("Class/book.php");

$sk = new Author("Stephen", "King");

echo $sk;
echo "<hr />";

$negativePages = -1138;
$negativePrice = -15;
$b1 = new Book("Ca", $negativePages, 1986, 20, $sk);
$b2 = new Book("Simetierre", 374, 1983, $negativePrice, $sk);
$b3 = new Book("Le Fléau", 823, 1978, 14, $sk);
$b4 = new Book("Shining", 447, 1977, 16, $sk);

echo $b1;
echo "<hr />";

$sk->afficherBibliographie();
echo "<hr />";

echo $sk;

?>