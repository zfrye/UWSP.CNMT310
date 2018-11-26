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

$str = "";

function checkEmpty($value) {
	return !empty($value);
}


if ((isset($_POST["username"]) && checkEmpty($_POST["username"])) && (isset($_POST["password"]) && checkEmpty($_POST["password"])))
{
    
$data = array("username" => $_POST['username'],"pass" => $_POST["username"]);
$dataJson = json_encode($data);// YOUR CODE HERE TO ENCODE AS JSON

$postString = "user=YOU&password=SOMEPASS&data=" .
               urlencode($dataJson);

$contentLength = strlen($postString);

$header = array(
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: ' . $contentLength
);

$url = "http://cnmtsrv2.uwsp.edu/~zfrye858/lab6/sum.php";

$ch = curl_init($url);// YOUR CODE HERE TO INITIALIZE A CURL RESOURCE

curl_setopt($ch,
    CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,
    CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch,
    CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,
	CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,
	CURLOPT_URL, $url);
// USE curl_setopt to set the following options:
// CURLOPT_RETURNTRANSFER
// CURLOPT_URL

$return = curl_exec($ch);// YOUR CODE HERE TO EXECUTE THE CURL CALL

print $return;

curl_close($ch);
}
else
{
    $str .="Please enter both a username and password \n";
}

site:

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
print " 	<h1>Authentication</h1>\n";
print " <p>$str</p>\n";
print "	</div>\n";

print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();
?>

