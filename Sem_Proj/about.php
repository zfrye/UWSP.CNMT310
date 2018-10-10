<?php

require_once("Template.php");

$page = new Template("About");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print "	<nav>\n";
print "		<ul>\n";
print "     	<li><a href='home.php'>Home</a></li>\n";
print "		   	<li><a href='#' class='active'>About</a></li>\n";
print "     	<li><a href='contact.php'>Contact Us</a></li>\n";
print "   	</ul>\n";
print "	</nav>\n";
print " <div class='main'>\n";
print " 	<h1>About Us</h1>\n";
print " 	<p>This is the about page for Assignment 1, due on 9/30/2018 at 11:59pm Central Time. </br>\n
This is an individual assignment. No group work or collaboration is allowed for this assignment.</br>\n
Use the Template class to create a website. The website should consist of the following pages....</br>\n";
print " 	</br>\n";
print " 	Created by Zachery Frye.\n";
print " 	</p>\n";
print "	</div>\n";

print $page->getBottomSection();

?>