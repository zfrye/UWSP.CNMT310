<?php

require_once("Template.php");

$page = new Template("Home");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print "	<nav>\n";
print "		<ul>\n";
print "     	<li><a href='#' class='active'>Home</a></li>\n";
print "		   	<li><a href='about.php'>About</a></li>\n";
print "     	<li><a href='contact.php'>Contact Us</a></li>\n";
print "   	</ul>\n";
print "	</nav>\n";
print " <div class='main'>\n";
print " 	<h1>Home</h1>\n";
print " 	<p>This is the homepage for assignment 1.</p>\n";
print "	</div>\n";

print $page->getBottomSection();

?>