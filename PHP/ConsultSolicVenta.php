<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSV = $consult->consultSolicVenta();

$consultSV1 = $consult->consultSolicVenta();

$consultV = $consult->consultVenta();

$consultV1 = $consult->consultVenta();

$consultIDP = $consult->consultProdInvent();

$consultDV = $consult->consultDetalleVent();

$consultV2 = $consult->consultVenta();

$consultDV1 = $consult->consultDetalleVent();

?>