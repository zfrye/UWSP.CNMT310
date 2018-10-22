<?php
require_once("Template.php");
require_once("DB.class.php");
$page = new Template("Thank You");
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
	
	//Create DB object
	$db = new DB();

	//Test connection
	if (!$db->getConnStatus()) {
	  print "An error has occurred with connection\n";
	  exit;
	}

	//Set terms from POST
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$comment = $_POST["comment"];

	//Sanitize Input Term For Database
	$emailSan = $db->dbEsc($email);
	$phoneSan = $db->dbEsc($phone);
	$commentSan = $db->dbEsc($comment);

	//Input Query String
	$query = "INSERT INTO contactRequests (inserttime,email,phone,message) VALUES (now(), '$emailSan', '$phoneSan', '$commentSan');";

	//Execute Query
	$result = $db->dbCall($query);

	//Print error if failed query
	if(!$result){
		print "There was an error submitting you contact request. \n";
		exit;
	}
	
}else{
	echo "Error"; 
}

print $page->getBottomSection();
?>