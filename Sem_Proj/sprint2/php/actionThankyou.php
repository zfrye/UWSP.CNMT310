<?php

session_start();

require_once("../class/Template.php");
require_once("../class/DB.class.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("Thank You");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['isLoggedIn'])){
	$nav->setLog($_SESSION['isLoggedIn']);
	$nav->setName($_SESSION['Name']);
	if(isset($_SESSION['isAdmin'])){
		$nav->setAdmin($_SESSION['isAdmin']);
		if($_SESSION['isAdmin'] == true){
			$nav->setAdminNav();
		}
	}
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
print $nav->getAdminNav();
print $log->getLogin();

$str = "";

function checkEmpty($value) {
	return !empty($value);
}
if (isset($_POST['email']) && checkEmpty($_POST['email']) && isset($_POST['comment']) && checkEmpty($_POST['comment'])) {
	$str .= "Thank you for contacting us, someone will get back to you shortly";
	
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		//Create DB object
		$db = new DB();

		//Test connection
		if (!$db->getConnStatus()) {
			$str .= "An error has occurred with connection\n";
			exit;
		}

		//Sanitize Input Term For Database
		$emailSan = $db->dbEsc($_POST["email"]);
		$phoneSan = $db->dbEsc($_POST["phone"]);
		$commentSan = $db->dbEsc($_POST["comment"]);

		//Input Query String
		$query = "INSERT INTO contactRequests (inserttime,email,phone,message) VALUES (now(), '$emailSan', '$phoneSan', '$commentSan');";

		//Execute Query
		$result = $db->dbCall($query);

		//Print error if failed query
		if(!$result){
			$str .= "There was an error submitting you contact request. \n";
			exit;
		}
	}
	else
	{
		$str .= "Please enter a valid email address \n";
	}

	
	
}else{
	$str .= "Please fill out all of the fields. \n"; 
}


print " <div class='main'>\n";
print " 	<h1>Contact Us</h1>\n";
print " <p>$str</p>\n";
print "	</div>\n";

print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();
?>
