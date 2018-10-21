<?php
require_once("Template.php");
$page = new Template("Home");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print " <nav>\n";
print "  <ul>\n";
print "   <li><a href='home.php'>Home</a></li>\n";
print "   <li><a href='about.php'>About</a></li>\n";
print "   <li><a href='contact.php'>Contact Us</a></li>\n";
print "   <li><a href='#' class='active'>Search</a><li>\n";
print "  </ul>\n";
print " </nav>\n";
print " <div class='main'>\n";
print "     <h1>Search page </h1>\n";
print "     <form name='searchForm' action='./results.php' method='Post'>\n";
print "         <input type='text' name='search' placeholder='Search..'>\n";
print "     </form>\n";
print " </div>\n";
print $page->getBottomSection();
?>