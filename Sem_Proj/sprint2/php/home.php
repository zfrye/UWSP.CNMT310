<?php

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");
session_start();

$page = new Template("Home");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['logged'])){
	$nav->setLog($_SESSION['logged']);
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
print $log->getLogin();

print " <div class='main'>\n";
print " 	<h1>Home</h1>\n";
print " 	<p>This is the homepage for Sprint 2 Assignment.</p>\n";
print "	</div>\n";

print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();

?>
