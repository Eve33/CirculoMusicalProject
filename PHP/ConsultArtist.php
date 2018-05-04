<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultIDA = $consult->consultArtist();

$consultA = $consult->consultArtist();

?>