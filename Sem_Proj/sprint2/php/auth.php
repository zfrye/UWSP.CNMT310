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
}
$nav->setNavSection();
$log = new Login();
$log->setLogin();
print $nav->getNav();
if(isset($_SESSION['isAdmin'])){
	$nav->setAdmin($_SESSION['isAdmin']);
	if($_SESSION['isAdmin'] == true){
		$nav->setAdminNav();
		print $nav->getAdminNav;
	}
}
print $log->getLogin();

function checkEmpty($value) {
	return !empty($value);
}

if ((isset($_POST["username"]) && checkEmpty($_POST["username"])) && (isset($_POST["password"]) && checkEmpty($_POST["password"])))
{
    // Create DB Object
    $db = new DB();

    // Test Connection
    if (!$db->getConnStatus()) {
        Print "An error has occurred with connection \n";
    }

    // Sanitize Username and Pass
    $sanUsername = $_POST["username"];
    $sanPassword = $_POST["password"];

    // Set query string to retrive User and Role for given Username
    $query = "SELECT role.rolename,user.userpass,user.userstatus,user.realname,user.email FROM role,user2role,user WHERE username = '$sanUsername' AND user.id = user2role.userid AND role.id = user2role.roleid";

    // Run query
    $result = $db->dbCall($query);

    //Print error if failed query
    if(!$result){
        print "Account not found \n";
        exit;
    }

    if (password_verify($sanPassword, $result[0]["userpass"]))
    {
        $_SESSION["isLoggedIn"] = true;

        foreach($result as $entry)
        {
            if ($entry["rolename"] == "admin")
            {
                $_SESSION["isAdmin"] = true;
            }
        }

        $fullname = $result[0]["realname"];

        $names = explode(" ", $fullname);

        $_SESSION["Name"] = $names[0];

        $_SESSION["Email"] = $result[0]["email"];

        Print "Welcome " . $_SESSION["Name"] . "\n";
    }
    else
    {
        Print "Bad Username or Password. \n";
    }
}
else
{
    Print "Please enter both a username and password \n";
}

print "<script src='../js/myLogin.js'></script>";
?>