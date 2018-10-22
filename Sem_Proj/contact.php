<?php

require_once("Template.php");
require_once("NavBar.php");

$page = new Template("Contact");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
$nav->setNavSection();
print $nav->getNav();

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