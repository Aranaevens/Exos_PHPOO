<?php

require_once("Class/consult.php");
require_once("Class/dentist.php");
require_once("Class/patient.php");

$p1 = new Patient("Micka", "Murmann");
$p2 = new Patient("Virgile", "Gibello");

echo $p1 . "<br />";
echo $p2 . "<br />";
echo "<hr />";

$d1 = new Dentist("Sébastien", "Wilsheim");
$d2 = new Dentist("Tara", "Durand");

echo $d1 . "<br />";
echo $d2 . "<br />";
echo "<hr />";

$c1 = new Consultation("05/05/2019", "09:00", $p1, $d1);
$c2 = new Consultation("01/04/2019", "08:00", $p1, $d2);
$c3 = new Consultation("01/05/2019", "10:00", $p1, $d1);
$c4 = new Consultation("01/06/2019", "11:00", $p2, $d2);

$p1->afficherConsultations();
echo "<br />";
$p2->afficherConsultations();
echo "<br />";
$d1->afficherConsultations();
echo "<br />";
$d2->afficherConsultations();

?>