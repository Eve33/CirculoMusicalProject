<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$year = $consult->getYear();

$enero = $consult->consultGEvePorMes("1") + $consult->consultGVentPorMes("1") + $consult->consultGRentPorMes("1");

$febrero = $consult->consultGEvePorMes("2") + $consult->consultGVentPorMes("2") + $consult->consultGRentPorMes("2");

$marzo = $consult->consultGEvePorMes("3") + $consult->consultGVentPorMes("3") + $consult->consultGRentPorMes("3");

$abril = $consult->consultGEvePorMes("4") + $consult->consultGVentPorMes("4") + $consult->consultGRentPorMes("4");

$mayo = $consult->consultGEvePorMes("5") + $consult->consultGVentPorMes("5") + $consult->consultGRentPorMes("5");

$junio = $consult->consultGEvePorMes("6") + $consult->consultGVentPorMes("6") + $consult->consultGRentPorMes("6");

$julio = $consult->consultGEvePorMes("7") + $consult->consultGVentPorMes("7") + $consult->consultGRentPorMes("7");

$agosto = $consult->consultGEvePorMes("8") + $consult->consultGVentPorMes("8") + $consult->consultGRentPorMes("8");

$septiembre = $consult->consultGEvePorMes("9") + $consult->consultGVentPorMes("9") + $consult->consultGRentPorMes("9");

$octubre = $consult->consultGEvePorMes("10") + $consult->consultGVentPorMes("10") + $consult->consultGRentPorMes("10");

$noviembre = $consult->consultGEvePorMes("11") + $consult->consultGVentPorMes("11") + $consult->consultGRentPorMes("11");

$diciembre = $consult->consultGEvePorMes("12") + $consult->consultGVentPorMes("12") + $consult->consultGRentPorMes("12");

$arrayData = array("Enero" => $enero, "Febrero" => $febrero, "Marzo" => $marzo, "Abril" => $abril, "Mayo" => $mayo, "Junio" => $junio, "Julio" => $julio, "Agosto" => $agosto, "Septiembre" => $septiembre, "Octubre" => $octubre, "Noviembre" => $noviembre, "Diciembre" => $diciembre);
?>