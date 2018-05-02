<?php

$nomPub = $_POST['nombreP'];
$emailPub = $_POST['emailP'];
$telefPub = $_POST['telefonoP'];
$mensajePub = $_POST['mensajeP'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertComentPub($nomPub, $emailPub, $telefPub, $mensajePub);

?>
