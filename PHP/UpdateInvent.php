<?php

$idPInv = $_POST['idProdRest'];
$cPInv = $_POST['cantProdRest'];


include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->updateInvent($idPInv,$cPInv);

?>