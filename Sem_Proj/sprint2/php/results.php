<?php
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
if(isset($_SESSION['isLogged'])){
	$nav->setLog($_SESSION['isLogged']);
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
if(isset($_SESSION['isAdmin'])){
	$nav->setAdmin($_SESSION['isAdmin']);
	if($_SESSION['isAdmin'] == true){
		$nav->setAdminNav;
		print $nav->getAdminNav;
	}
}
print $log->getLogin();


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

	//Set Search Term from POST
	$search = $_POST["search"];

	//Sanitize Database Input
	$searchSan = $db->dbEsc($search);

	//Search Query String
	$query = "SELECT * FROM bookinfo WHERE '$searchSan' = bookinfo.booktitle OR '$searchSan' = bookinfo.author OR '$searchSan' = bookinfo.isbn;";

	//Execute Query
	$result = $db->dbCall($query);

	//Print error if failed query
	if(!$result){
		print "No Results Found \n";
		exit;
	}

	//Print out Results
	print "			<table style='width:100%'> \n";
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
print $page->getBottomSection();
?> 