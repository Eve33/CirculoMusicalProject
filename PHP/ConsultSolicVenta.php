<?php

include 'DBconexion.php';

$consult = new User("localhost", "", "dbcirculomusical", "root", "");

$consultSV = $consult->consultSolicVenta();


?>