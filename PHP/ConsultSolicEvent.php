<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSE = $consult->consultSolicEvent();

$consultSE1 = $consult->consultSolicEvent();

$consultIDA = $consult->getIDArtist();

$consultA =  $consult->consultArtist();

$consultE = $consult->consultEvent();

$consultIDE = $consult->getIDEvent();

?>