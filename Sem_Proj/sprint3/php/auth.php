<?php

session_start();

require_once("../class/Template.php");
require_once("../class/DB.class.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$str = "";

function checkEmpty($value) {
	return !empty($value);
}


if ((isset($_POST["username"]) && checkEmpty($_POST["username"])) && (isset($_POST["password"]) && checkEmpty($_POST["password"])))
{
    
	$data = array("username" => $_POST['username'],"pass" => $_POST["password"]);
	$dataJson = json_encode($data);// YOUR CODE HERE TO ENCODE AS JSON

	$postString = "data=" .
				urlencode($dataJson);

	$contentLength = strlen($postString);

	$header = array(
	'Content-Type: application/x-www-form-urlencoded',
	'Content-Length: ' . $contentLength
	);

	$url = "http://cnmtsrv2.uwsp.edu/~cnimm823/Sem_Proj/sprint3/php/serverAuth.php";

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

	curl_close($ch);

	$returnData = json_decode($return, true);

	if (isset($returnData["Error"]))
	{
		$str .= $returnData["Error"];
	}
	else
	{
		$_SESSION['isLoggedIn'] = $returnData['isLoggedIn'];
		$_SESSION['isAdmin'] = $returnData['isAdmin'];
		$_SESSION['Name'] = $returnData['Name'];
		$_SESSION['Email'] = $returnData['Email'];
		header('Location: ../php/home.php');
		exit;
	}
}
else
{
    $str .= "Please enter both a username and password \n";
}

$page = new Template("Thank You");
$page->setHeadSection("<link rel='stylesheet' href='../css/semStyle.css'>");
$page->setTopSection();
$page->setBottomSection();
print $page->getTopSection();

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

