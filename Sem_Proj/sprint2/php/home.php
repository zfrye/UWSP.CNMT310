<?php

require_once("../class/Template.php");
require_once("../class/NavBar.php");
session_start();

$page = new Template("Home");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
$nav->setNavSection();
print $nav->getNav();

print " <div class='main'>\n";
print " 	<h1>Home</h1>\n";
print " 	<p>This is the homepage for Sprint 1 and 2 Assignment.</p>\n";
print "	</div>\n";

print $page->getBottomSection();

?>
