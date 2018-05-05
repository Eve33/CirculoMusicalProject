<?php

$idR= $_POST['idR'];
$idDR = $_POST['idDR'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteDR($idR, $idDR);

?>