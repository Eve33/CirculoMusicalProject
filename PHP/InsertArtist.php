<?php

$nombre = $_POST['nombreArt'];
$genero = $_POST['generoArt'];
$biografia = $_POST['bioArt'];
$precio = $_POST['precioArt'];

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->insertArtist($nombre, $genero, $biografia, $precio);

?>
