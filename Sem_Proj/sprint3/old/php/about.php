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
print "<p>This is the about page for Sprint 1 Assignment, due on 10/23/2018 at 11:59pm Central Time. <br/><br/>
       This is a group assignment. You are expected to work within your group to complete this assignment.
       Do not work with or collaborate with other groups.
       Use the Template class to create a website. The website should consist of the following pages....<br/>\n";
print "  <br/>\n";
print "  <ul>\n";
print "      <li><p>Choose a web site from the individual assignment (assignment 1) for your group to use for this
                assignment. Ensure that the menu links to all pages (except the 'Thank you' page, which is
                reachable through the Contact form). Correct any deficiencies noted within the existing code:
                Be sure to use the original Assignment 1 to look for deficiencies, even if those were not noted in
                the grading.</p></li>\n";
print "      <li><p>Create a new page, linked within the menu, that enables the user to search for a book. The
                search should use the provided Database class to query the database across the title, author,
                and isbn fields using a single query. In other words, the web form should not require that the
                user chooses the ISBN, author, or title. The form pages should be styled to look like the other
                pages on the site.</p></li>\n";
print "      <li><p>Create a result page that displays the matching results from the database in an HTML table,
                again with the same layout (look and feel) as the other pages.</p></li>\n";
print "      <li><p>Change the Contact form to place all captured information into a database.</p></li>\n";
print "    </ul>\n";
print "  <br/>\n";
  
print "  <b><p>Notes:</p></b>\n";
print "    <ul>\n";
print "      <li><p>All code must produce valid HTML5 and valid CSS must be used. All code will be tested on
                cnmtsrv2 and therefore should assume running on Linux. A portion of the grade includes code
                styling and the use of minimal code along with an optimal algorithm for the problem being
                solved.</p></li>\n";
print "      <li><p>All work should be shared among team members and code should be created in a directory
                called sprint1, with subdirectories for css, js, classes, and so on.</p></li>\n";
print "    </ul>\n";
print "    <br/>\n";

print "  <b><p>Deliverable:</p></b>\n";
print "  <ul><p>A PDF or plaintext document in the Dropbox containing the commit id of each team member along with
            any narrative to explain how to view and/or test the code.</p></ul><br/>\n";
  
print "  <b><p>Hints:</p></b>\n";
print "  <ul>\n";
print "    <li><p>Coordinate on a solution - work together to determine how best to accomplish all tasks - avoid
                overlapping or duplicating work.</p></li>\n";
print "    <li><p>Much effort will be spent around writing the query to search the bookinfo database.</p></li>\n";
print "    <li><p>Remember to escape form input before using it in a database query/insert.</p></li>\n";
print "    <li><p>There is opportunity to divide work so that team members can utilize their strengths. For
                example, if one team member has experience working with databases, have that person work
                on the database portion(s) of the assignment. If another team member has CSS experience,
                have that person work on the layout.</p></li>\n";
print "    <li><p>Work early and do not underestimate the amount of work involved.</p></li>\n";
print "  </ul>\n";
print "  <br/>\n";


print "  <p>Created by CNMT 310 - Group 2.</p>\n";
print "</p>\n";
print "</div>\n";
print "<script src='../js/myLogin.js'></script>";
print "<script src='../js/myLogin.js'></script>";
print $page->getBottomSection();

?>