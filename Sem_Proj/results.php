<?php
require_once("Template.php");
require_once("DB.class.php");
$page = new Template("Results");
$page->setHeadSection("<script src='assign1form.php'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();
print " <div class='main'>\n";
print " 	<h1>Query</h1>\n";

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
$query = "SELECT * FROM bookinfo WHERE $searchSan = bookinfo.booktitle OR $searchSan = bookinfo.author OR $searchSan = bookinfo.isbn;";

//Execute Query
$result = $db->dbCall($query);

//Print error if failed query
if(!$result){
	print "Error \n";
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
print "			</table> \n";
print "	</div>\n";
print $page->getBottomSection();
?> 