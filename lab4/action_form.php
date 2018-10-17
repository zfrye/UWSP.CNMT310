<?php
require_once("Template.php");

$page = new Template("Result Page");
$page->setHeadSection("<link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print " <div class='main'>\n";
print " 	<h1>Results</h1>\n";

if(isset($_POST['email'])){
	$sanEmail = SanitizeEmail($_POST['email']);
	if(filter_var($sanEmail,FILTER_VALIDATE_EMAIL)){
		echo"<h3>Email:</h3>\n";
		echo"<p>$sanEmail<p>\n";
	}else{
		echo"<h3>Email:</h3>\n";
		echo"<p>Not valid<p>\n";
	}
}else{
	echo "Error, Please enter valid email.";
}

if(isset($_POST['number'])){
	$sanInt = SanitizeInteger($_POST['number']);
	if(filter_var($sanInt,FILTER_VALIDATE_INT)){
		echo"<h3>Number:</h3>\n";
		echo"<p>$sanInt<p>\n";
	}else{
		echo"<h3>Number:</h3>\n";
		echo"<p>Not valid<p>\n";
	}
}else{
	echo "Error, Please enter valid number.";
}
if(isset($_POST['url'])){
	$sanURL = SanitizeURL($_POST['url']);
	if(filter_var($sanURL,FILTER_VALIDATE_URL)){
		echo"<h3>URL:</h3>\n";
		echo"<p>$sanURL<p>\n";
	}else{
		echo"<h3>URL:</h3>\n";
		echo"<p>Not valid<p>\n";
	}
}else{
	echo "Error, Please enter valid URL.";
}


print " </div>\n";

print $page->getBottomSection();

//END HTML DOC

function SanitizeEmail($dirtEmail){
	return filter_var($dirtEmail,FILTER_SANITIZE_EMAIL);
	
}

function SanitizeInteger($dirtInt){
	return filter_var($dirtInt,FILTER_SANITIZE_NUMBER_INT);
	
}

function SanitizeURL($dirtURL){
	return filter_var($dirtURL,FILTER_SANITIZE_URL);
	
}

?>