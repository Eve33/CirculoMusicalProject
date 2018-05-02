<?php

$idProd = $_POST['idProd'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteProduct($idProd);

?>
