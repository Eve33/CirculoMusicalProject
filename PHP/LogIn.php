<?php
session_start();

$user = $_POST['usuario'];
$password = md5($_POST['password']);

include 'DBconexion.php';

$loginuser = new User("localhost", "", "dbcirculomusical", "root", "");

if($loginuser->logIn($user, $password)){
   $_SESSION['loginuser'] = $user;
   header('Location: ../Cover/Cover.html');
}
else{
    header('Location: ../LogIn/LogIn.php'); 
}
?>