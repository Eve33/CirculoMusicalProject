<?php

$idRent = $_POST['idRent'];
$cDias = $_POST['cantDias'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->updateRenta($idRent, $cDias);

?>
