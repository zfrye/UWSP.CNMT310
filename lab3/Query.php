<?php
require_once("Template.php");
require_once("DB.class.php");

$page = new Template("Query");
$page->setHeadSection("<script src='assign1form.php'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();


print " <div class='main'>\n";
print " 	<h1>Query</h1>\n";
//create new DB var
$db = new DB();
//Test connection to DB
if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}
//assigns query
$query = "SELECT * FROM bookinfo;";
//assigns result to the return from the query
$result = $db->dbCall($query);
//checks result
if(!$result){
	print "Error \n";
	exit;
}
//loops for content inside result
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