<?php

$idRent = $_POST['idRent'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteRenta($idRent);

?>
