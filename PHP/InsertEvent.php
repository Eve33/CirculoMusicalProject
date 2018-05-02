<?php


$idSolic = $_POST['idSolic'];
$nombreEve = $_POST['nombreEve'];
$fecha = $_POST['fechaEve'];
$locacion = $_POST['locacionEve'];
$nEntr = $_POST['numEntradas'];
$pEntr = $_POST['precioEntrada'];
$idArt = $_POST['idArt'];


include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertEvent($idSolic, $nombreEve, $fecha, $locacion, $nEntr, $pEntr, $idArt);

?>
