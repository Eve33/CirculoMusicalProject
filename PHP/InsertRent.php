<?php

$idSolic = $_POST['idSolic'];
$cantD = $_POST['cantDias'];


include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertRenta($idSolic, $cantD);

?>