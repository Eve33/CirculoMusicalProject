<?php

$idEve = $_POST['idEve'];
$state = $_POST['estadoBaja'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteEvent($idEve, $state);

?>
