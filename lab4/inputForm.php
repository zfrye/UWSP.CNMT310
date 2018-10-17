<?php
require_once("Template.php");

$page = new Template("Input Form");
$page->setHeadSection("<link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print " <div class='main'>\n";
print " 	<h1>Input Form</h1>\n";

print " 	<form action='action_form.php' method='post'>\n";
print "			<p>Email:</p>";
print "			<input type='text' name='email'></br></br>\n";
print "			<p>Number:</p>";
print "			<input type='text' name='number'></br></br>\n";
print "			<p>URL:</p>";
print "			<input type='text' name='url'></br></br>\n";

print "			<input type='submit' value='Submit'>\n";

print " 	</form>\n";

print " </div>\n";

print $page->getBottomSection();


?>