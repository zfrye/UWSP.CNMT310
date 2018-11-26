<?php

session_start();

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");
$page = new Template("Home");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['isLoggedIn'])){
	$nav->setLog($_SESSION['isLoggedIn']);
	$nav->setName($_SESSION['Name']);
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


print " <div class='main'>\n";
print "     <h1>Search page </h1>\n";
print "     <form name='searchForm' action='./results.php' method='Post'>\n";
print "         <input type='text' name='search' placeholder='Search..'>\n";
print "     </form>\n";
print " </div>\n";
print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();
?>