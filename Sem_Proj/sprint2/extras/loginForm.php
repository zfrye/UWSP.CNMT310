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



print $page->getBottomSection();
?>
