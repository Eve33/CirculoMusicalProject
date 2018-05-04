<?php
session_start();

$user = $_POST['usuario'];
$password = md5($_POST['password']);

include 'DBconexion.php';

$loginuser = new User("localhost", "", "dbcirculomusical", "root", "");

if($loginuser->logIn($user, $password)){
   $_SESSION['loginuser'] = $user;

   if($loginuser->getTypeUser($user)==1){
    $_SESSION['logintype'] = 'Admin';
    header('Location: ../UserAdmin/AdminArtist.php');
   }
   else{
    $_SESSION['logintype'] = 'Client';
    header('Location: ../UserClient/ClientSolic.php');
   }
}
else{
    header('Location: ../LogIn/LogIn.php'); 
}
?>