<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSV = $consult->consultSolicVenta();

$consultSV1 = $consult->consultSolicVenta();

$consultV = $consult->consultVenta();

$consultV1 = $consult->consultVenta();

?>