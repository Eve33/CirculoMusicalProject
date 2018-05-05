<?php


$idR = $_POST['idRent'];
$idP = $_POST['idProd'];
$cant = $_POST['cantProd'];
$candDes = $_POST['cantDesc'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertDR($idR,$idP,$cant, $candDes);

?>