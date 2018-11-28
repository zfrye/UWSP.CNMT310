<?php

session_start();

require_once("../class/Template.php");
require_once("../class/NavBar.php");
require_once("../class/ModalLogin.php");

$page = new Template("About");
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


print "<div class='main'>\n";
print "<h1>About Us</h1>\n";
print "<h2>Sprint 3</p></h2>\n";
print "<p>Due 12/2/2018 - 11:59pm Central Time</p>
		<p>For this final portion of the group assignment, you will split your code into frontend and (website/display) and backend (data-related) activities for authentication by creating a web service (see details below) for authentication for you project. Aditionally, you will update your project based on grading and feedback from previous sprints, if necessary.</p>\n";
print " <b><p>Details:</p></b>\n";
print "  <ul>\n";
print "      <li><p>Create a REST web service (you only need to 			implement a POST response method) for authentication 			that returns a JSON-encoded response containing the information 			from the user table. Essentially, the same information that you were required to return for the previous sprint should now be implemented as a web service.</p></li>\n";
print "      <li><p>Consume/call your web service for authentication and user data retrieval. The call to the web service should be JSON-encoded as well. Note that this means 					removing any and all SQL queries for user information from your 'frontend' code. In other words, the only way your code should retrieve user information is through its 			call to the authentication web service.</p></li>\n";
		print "      <li><p>If your group did not earn full points on previous sprints, add items to your backlog such that the code meets the requirements from the previous sprints. </p></li>\n";
		print "  </ul>\n";
		  
		print "  <b><p>Deliverable:</p></b>\n";
		print "  <ul><p>Provide a text of PDF document to the dropbox containing the git commit IDs for all the group members and a URL where the group code can be tested.</p></ul><br/>\n";

print "<h2>Sprint 2</p></h2>\n";
print "<p>Due 11/18/2018 - 11:59pm Central Time</p>
       <p>This is a group assignment. You are expected to work within your group to complete this assignment. Do not work with or collaborate with other groups.\n"; 
print " <b><p>The website should:</p></b>\n";
print "  <ul>\n";
print "      <li><p>Implement the authentication database schema discussed in lecture. You should manually create at least two users, one a “normal” user and one an “administrator” user.</p></li>\n";
print "      <li><p>Create a web form that enables a user to authenticate using credentials from the authentication database implemented as part of this assignment. Based on our discussion in lecture, the form should use the correct input types for this type of page and display an appropriate error message if authentication fails.</p></li>\n";
print "      <li><p>On successful authentication, display (in the header/menu area of each page that the user then clicks on) a message indicating that the user is logged in, like “Welcome Steve”. Add a link called “Log Out” that logs the user out such that page no longer recognize them as being authenticated and redirects them back to the home page after doing so. Be sure the Log Out link does not appear when not logged in.</p></li>\n";
print "      <li><p>Create a page called Contact Data that contains the information from the contact form database in an HTML table. The page should only be viewable to users with Administrator privileges and should display an error for unauthenticated users or users without the Administrator role.</p></li>\n";
print "      <li><p>Display a menu item for the Contact Data page only if the user is an Administrator.</p></li>\n";
print "      <li><p>Note that because this assignment builds on the previous sprint assignment, you should consider adding items to the backlog that were recommended or discussed as part of the feedback for that assignment.</p></li>\n";
print "  </ul>\n";
  
print "  <b><p>Deliverable:</p></b>\n";
print "  <ul><p>A PDF or txt file in the dropbox containing git commit ids for all group members along with narrative for testing. You must also include the URL for testing the site and credentials for both types of users implemented as part of this assignment. Missing (or broken) URL or missing credentials will result in a grade reduction.</p></ul><br/>\n";
                



print "<h2>Sprint 1</h2>\n";
print "<p>Due 10/23/2018 - 11:59pm Central Time</p>
       <p>This is a group assignment. You are expected to work within your group to complete this assignment.
       Do not work with or collaborate with other groups. Use the Template class to create a website.\n"; 
print " <b><p>The website should consist of the following pages:</p></b>\n";
print "  <ul>\n";
print "      <li><p>Choose a web site from the individual assignment (assignment 1) for your group to use for this assignment. Ensure that the menu links to all pages (except the 'Thank you' page, which is reachable through the Contact form). Correct any deficiencies noted within the existing code: Be sure to use the original Assignment 1 to look for deficiencies, even if those were not noted in the grading.</p></li>\n";
print "      <li><p>Create a new page, linked within the menu, that enables the user to search for a book. The search should use the provided Database class to query the database across the title, author, and isbn fields using a single query. In other words, the web form should not require that the user chooses the ISBN, author, or title. The form pages should be styled to look like the other pages on the site.</p></li>\n";
print "      <li><p>Create a result page that displays the matching results from the database in an HTML table, again with the same layout (look and feel) as the other pages.</p></li>\n";
print "      <li><p>Change the Contact form to place all captured information into a database.</p></li>\n";
print "    </ul>\n";
print "  <b><p>Notes:</p></b>\n";
print "    <ul>\n";
print "      <li><p>All code must produce valid HTML5 and valid CSS must be used. All code will be tested on cnmtsrv2 and therefore should assume running on Linux. A portion of the grade includes code styling and the use of minimal code along with an optimal algorithm for the problem being solved.</p></li>\n";
print "      <li><p>All work should be shared among team members and code should be created in a directory called sprint1, with subdirectories for css, js, classes, and so on.</p></li>\n";
print "    </ul>\n";
print "  <b><p>Deliverable:</p></b>\n";
print "  <ul><p>A PDF or plaintext document in the Dropbox containing the commit id of each team member along with any narrative to explain how to view and/or test the code.</p></ul>\n";
print "  <b><p>Hints:</p></b>\n";
print "  <ul>\n";
print "    <li><p>Coordinate on a solution - work together to determine how best to accomplish all tasks - avoid overlapping or duplicating work.</p></li>\n";
print "    <li><p>Much effort will be spent around writing the query to search the bookinfo database.</p></li>\n";
print "    <li><p>Remember to escape form input before using it in a database query/insert.</p></li>\n";
print "    <li><p>There is opportunity to divide work so that team members can utilize their strengths. For example, if one team member has experience working with databases, have that person work on the database portion(s) of the assignment. If another team member has CSS experience, have that person work on the layout.</p></li>\n";
print "    <li><p>Work early and do not underestimate the amount of work involved.</p></li>\n";
print "  </ul>\n";
print "  <br/>\n";

print "  <p>Created by CNMT 310 - Group 2.</p>\n";
print "</div>\n";



print "<script src='../js/myLogin.js'></script>";
print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();

?>