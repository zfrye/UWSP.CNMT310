<?php

session_start();

require_once("../class/Template.php");
require_once("../class/DB.class.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("Data");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));
if(isset($_SESSION['isLoggedIn'])){
	$nav->setLog($_SESSION['isLoggedIn']);
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

print " <div class='main'>\n";
print " 	<h1>Contact Data Page</h1>\n";

//Create DB object
$db = new DB();

//Test connection
if (!$db->getConnStatus()) {
	print "An error has occurred with connection\n";
	exit;
}

//Search Query String
$query = "SELECT * FROM contactrequests";

//Execute Query
$result = $db->dbCall($query);

//Print error if failed query
if(!$result){
	print "No Results Found \n";
	exit;
}

//Print out Results
print "			<table style='width:100%'> \n";
print"				<tr>\n";
print"				<th>ID</th>\n";
print"				<th>Date Submitted</th>\n";
print"				<th>Email</th>\n";
print"				<th>Phone Number</th>\n";
print"				<th>Message</th>\n";
print"				</tr>\n";
foreach($result as $row){
	print"				<tr>\n";
	foreach($row as $item){
		print"					<td>$item</td>\n";
	}
	print"				</tr>\n";
}

print "	</div>\n";

print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();

?>
