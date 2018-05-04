<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSR = $consult->consultSolicRenta();

$consultSR1 = $consult->consultSolicRenta();

$consultR = $consult->consultRenta();

$consultR1 = $consult->consultRenta();

?>