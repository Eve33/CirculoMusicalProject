<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultP = $consult->consultProduct();

$consultIDP = $consult->getIDProduct();

?>