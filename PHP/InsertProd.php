<?php

$nombre = $_POST['nombreProd'];
$desc = $_POST['descProd'];
$cat = $_POST['categoria'];
$pUni = $_POST['precioUni'];
$pVen = $_POST['precioVen'];
$pRen = $_POST['precioRen'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertProduct($nombre, $desc, $cat, $pUni,$pVen,$pRen);

?>
