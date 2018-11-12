<?php

session_start();

require_once("../class/Template.php");
require_once("../class/NavBar.php");
$page = new Template("Home");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
$nav->setNavSection();
print $nav->getNav();

print " <div class='main'>\n";
print "     <h1>Search page </h1>\n";
print "     <form name='searchForm' action='./results.php' method='Post'>\n";
print "         <input type='text' name='search' placeholder='Search..'>\n";
print "     </form>\n";
print " </div>\n";
print $page->getBottomSection();
?>