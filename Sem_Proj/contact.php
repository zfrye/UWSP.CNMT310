<?php

require_once("Template.php");

$page = new Template("Contact");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print "<nav>\n";
print " <ul>\n";
print "  <li><a href='home.php'>Home</a></li>\n";
print "  <li><a href='about.php'>About</a></li>\n";
print "  <li><a href='#' class='active'>Contact Us</a></li>\n";
print "  <li><a href='search.php'>Search</a><li>\n";
print " </ul>\n";
print "</nav>\n";

print "<div class='main'>\n";
print " <h1>Contact Us</h1>\n";
print "   <form action='assign1form.php' method='post' id='contactform'>\n";
print "     Email Address: <input type='email' name='email'><br/>\n";
print "     Phone Number: <input type='number' name='phone'><br/>\n";
print "     <br/>\n";
print "     <input type='submit'> <br/>\n";
print "     <br/>\n";
print "   </form>\n";
print "   <textarea name='comment' form='contactform' placeholder='Enter text here...'></textarea>\n";
print "</div>\n";

print $page->getBottomSection();

?>