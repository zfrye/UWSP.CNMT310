<?php
require_once("Template.php");

$page = new Template("Script");
$page->setHeadSection("<script src='assign1form.php'></script><link rel='stylesheet' href='assign1style.css'>");
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

function checkEmpty($value) {
	return !empty($value);
}

if (isset($_POST['email']) && checkEmpty($_POST['email']) && isset($_POST['comment']) && checkEmpty($_POST['comment'])) {
	print "Thank you for contacting us, someone will get back to you shortly";
}else{
	echo "Error"; 
}
//var_dump($_POST);

print $page->getBottomSection();


?>