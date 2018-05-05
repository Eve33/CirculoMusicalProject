<?php

$idRent = $_POST['idRent'];
$estado = $_POST['estadoRent'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->updateRentaEstado($idRent, $estado);

?>