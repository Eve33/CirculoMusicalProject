<?php

$idVent = $_POST['idVent'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteVenta($idVent);

?>
