<?php


/**
*
* Login class
*
* Used to add Login Form to unique pages.
*
*
* Usage:
*	<body>
*		$login = new Login();
*		$login->setLogin();
*		$login->getLogin();
*
* @author Zachery Frye <zfrye858@uwsp.edu>
*
*/

class LogIn{
	
	private $_theLog;
	
	function __construct(){
		
	}
	
	function setLogin(){
		$returnVal = "";
		$returnVal .= "<div id='id00' class='modal'>\n";
		$returnVal .= "	<form class='modal-content animate' action='./auth.php' method='POST'>\n";
		$returnVal .= "	<div class='container'>\n";
		$returnVal .= "     <label for='username'><b>Username:</b></label>\n";
		$returnVal .= "		<input type='text' placeholer='Enter UserName' name='username'><br/>\n";
		$returnVal .= "     <label for='password'><b>Password:</b></label>\n";
		$returnVal .= "		<input type='password' name='password'><br/>\n";
		$returnVal .= "     <br/>\n";
		$returnVal .= "     <button type='submit'>Login</button> <br/>\n";
		$returnVal .= "     <br/>\n";
		$returnVal .= " </div>\n";
		$returnVal .= "	<div class='container' style='background-color:#f1f1f1'>\n";
		$returnVal .= "		<button type='button' onclick=\"document.getElementById('id00').style.display='none' \" class='cancelbtn'>Cancel</button>\n";
		$returnVal .= "	</div>\n";
		$returnVal .= " </form>\n";
		$returnVal .= "</div>";
		
		$this->_theLog = $returnVal;
	}
	
	function getLogin(){
		return $this->_theLog;
	}
	
}

?>