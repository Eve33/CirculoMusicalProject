<?php

$nombre = $_POST['nombre'];
$apellidoPat = $_POST['apellidoPat'];
$apellidoMat = $_POST['apellidoMat'];
$direc = $_POST['direccion'];
$fechaN = $_POST['fechaN'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

include 'DBconexion.php';

$user = new User("localhost", "", "dbcirculomusical", "root", "");
$user->signUp($nombre, $apellidoPat, $apellidoMat, $direc, $fechaN, $telefono, $email, $usuario, $password);

?>

