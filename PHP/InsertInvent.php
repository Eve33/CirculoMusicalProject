<?php

$idPInv = $_POST['idProdInv'];
$cPInv = $_POST['cantProdInv'];


include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertInvent($idPInv,$cPInv);

?>