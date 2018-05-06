<?php

$idV = $_POST['idVent'];
$idP = $_POST['idProd'];
$cant = $_POST['cantProd'];
$candDes = $_POST['cantDesc'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertDV($idV, $idP, $cant, $candDes);

?>