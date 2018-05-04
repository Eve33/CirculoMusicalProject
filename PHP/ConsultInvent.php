<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultP = $consult->consultProduct();

$consultIDP =$consult->consultProduct();

$consultIDPR =$consult->consultProduct();

$consultI = $consult->consultInvent();

?>