<?php

session_start();

$_SESSION['IsLoggedIn']='';
$_SESSION['IsAdmin']='';
$_SESSION['Name']='';
$_SESSION['Email']='';
unset($_SESSION['IsLoggedIn']);
unset($_SESSION['IsAdmin']);
unset($_SESSION['Name']);
unset($_SESSION['Email']);
session_destroy();

header('Location: ../php/home.php');
exit;

?>