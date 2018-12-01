<?php

session_start();

require_once("../class/Template.php");
require_once("../class/DB.class.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("Results");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

$nav = new NavBar(basename($_SERVER['REQUEST_URI']));

//checking for JS
print "<noscript>\n";
print "<aside id='id00'>\n";
print "<p>Enable JavaScript to login, etc.</p>\n";
print "</aside>\n";
print "</noscript>\n";
print "\n";

//Setting Variables for Session
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

//displaying Navigation.
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
print $nav->getAdminNav();
print $log->getLogin();

//page specific
print " <div class='main'>\n";
print " 	<h1>Query</h1>\n";

function checkEmpty($value) {
    return !empty($value);
}

if (isset($_POST['search']) && checkEmpty($_POST['search']))
{
	//Create DB object
	$db = new DB();

	//Test connection
	if (!$db->getConnStatus()) {
	  print "An error has occurred with connection\n";
	  exit;
	}

	//Sanitize Database Input
	$searchSan = $db->dbEsc($_POST["search"]);

	//Search Query String
	$query = "SELECT * FROM bookinfo WHERE '$searchSan' LIKE bookinfo.booktitle OR '$searchSan' LIKE bookinfo.author OR '$searchSan' LIKE bookinfo.isbn;";

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
	print"				<th>Time Entered</th>\n";
	print"				<th>Title</th>\n";
	print"				<th>ISBN</th>\n";
	print"				<th>Author</th>\n";
	print"				<th>Status</th>\n";
	print"				</tr>\n";
	foreach($result as $row){
		print"				<tr>\n";
		foreach($row as $item){
			print"					<td>$item</td>\n";
		}
		print"				</tr>\n";
	}
}
else
{
	echo "Please enter a search term.";
}

print "			</table> \n";
print "	</div>\n";
print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();
?> 