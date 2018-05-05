<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSR = $consult->consultSolicRenta();

$consultSR1 = $consult->consultSolicRenta();

$consultR0 = $consult->consultRenta();

$consultR = $consult->consultRenta();

$consultR1 = $consult->consultRenta();

$consultR2 = $consult->consultRenta();

$consultIDR = $consult->consultRenta();

$consultIDP = $consult->consultProdInvent();

$consultDR = $consult->consultDetalleRent();

$consultDR1 = $consult->consultDetalleRent();
?>