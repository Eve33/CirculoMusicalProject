<?php

$idArt = $_POST['idArt'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->deleteArtist($idArt);

?>
