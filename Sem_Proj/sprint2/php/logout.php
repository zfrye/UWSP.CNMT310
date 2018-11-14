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

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("Home");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

header('Location: ../php/home.php');
exit;

print $page->getBottomSection();

?>