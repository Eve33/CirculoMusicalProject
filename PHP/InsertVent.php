<?php

$idSolic = $_POST['idSolic'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertVenta($idSolic);

?>