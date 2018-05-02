<?php

$asuntoS = $_POST['asuntoSolic'];
$descS = $_POST['descSolic'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertSolic($asuntoS, $descS);

?>
