<?php

session_start();

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("Contact");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['isLoggedIn'])){
	$nav->setLog($_SESSION['isLoggedIn']);
	if(isset($_SESSION['isAdmin'])){
		$nav->setAdmin($_SESSION['isAdmin']);
		if($_SESSION['isAdmin'] == true){
			$nav->setAdminNav();
		}
	}
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
print $nav->getAdminNav();
print $log->getLogin();

print "<div class='main'>\n";
print " <h1>Contact Us</h1>\n";
print "   <form action='./actionThankyou.php' method='post' id='contactform'>\n";
print "     Email Address: <input type='email' name='email'><br/>\n";
print "     Phone Number: <input type='number' name='phone'><br/>\n";
print "     <br/>\n";
print "<textarea name='comment' form='contactform' placeholder='Enter text here...'></textarea>\n";
print "     <br/>\n";
print "     <input type='submit'> <br/>\n";
print "     <br/>\n";
print "   </form>\n";
print "</div>\n";

print "<script src='../js/myLogin.js'></script>";

print $page->getBottomSection();

?>