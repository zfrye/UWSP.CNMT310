<?php
require_once("Template.php");

$page = new Template("Script");
$page->setHeadSection("<script src='assign1form.php'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

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