<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultIDA = $consult->getIDArtist();

$consultA = $consult->consultArtist();

?>