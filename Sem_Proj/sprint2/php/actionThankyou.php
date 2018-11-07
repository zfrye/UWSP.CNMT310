<?php
require_once("../class/Template.php");
require_once("../class/DB.class.php");
require_once("../class/NavBar.php");

$page = new Template("Thank You");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
$nav->setNavSection();
print $nav->getNav();

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
