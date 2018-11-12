<?php

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");
session_start();

$page = new Template("Data");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['isLogged'])){
	$nav->setLog($_SESSION['isLogged']);
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
if(isset($_SESSION['isAdmin'])){
	$nav->setAdmin($_SESSION['isAdmin']);
	if($_SESSION['isAdmin'] == true){
		$nav->setAdminNav;
		print $nav->getAdminNav;
	}
}
print $log->getLogin();

print " <div class='main'>\n";
print " 	<h1>Home</h1>\n";
print " 	<p>This is the homepage for Sprint 2 Assignment.</p>\n";
print "	</div>\n";

print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();

?>