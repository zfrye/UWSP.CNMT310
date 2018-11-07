<?php
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

// username, password, link to forgot password

//if() {
print "<h1>Login</h1>\n";
print " <form action='../php/home.php' method='post' id=loginform'>\n";
print "     Username: <input type='username' name='username'><br/>\n";
print "     Password: <input type='password' name='password'><br/>\n";
print "     <br/>\n";
print "     <input type='submit'> <br/>\n";
print "     <br/>\n";
print " </form>\n";

//} else {

//}

print $page->getBottomSection();
?>
