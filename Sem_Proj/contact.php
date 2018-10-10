<?php

require_once("Template.php");

$page = new Template("Contact");
$page->setHeadSection("<script src='assign1js.js'></script><link rel='stylesheet' href='assign1style.css'>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();

print "	
<nav>\n
  <ul>\n
    <li><a href='home.php'>Home</a></li>\n
    <li><a href='about.php'>About</a></li>\n
    <li><a href='#' class='active'>Contact Us</a></li>\n
  </ul>\n
</nav>\n
<div class='main'>\n
<h1>Contact Us</h1>\n
<form action='assign1form.php' method='post' id='contactform'>\n
Email Address: <input type='email' name='email'><br/>\n
Phone Number: <input type='number' name='phone'><br/>\n
<br/>\n
<input type='submit'> <br/>\n
<br/>\n
</form>\n

<textarea name='comment' form='contactform' placeholder='Enter text here...'></textarea>\n

</div>\n
";

print $page->getBottomSection();

?>