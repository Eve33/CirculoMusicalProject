<?php

$idV= $_POST['idV'];
$idDV = $_POST['idDV'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteDV($idV, $idDV);

?>