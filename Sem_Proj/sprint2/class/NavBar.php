<?php


/**
*
* NavBar class
*
* Used to add NavBar to unique pages.
*
*
* Usage:
*	<body>
*		$nav = new NavBar();
*      	$nav->setNavSection();
*		$nav->getNav();
*
* @author Zachery Frye <zfrye858@uwsp.edu>
*
*/

class NavBar {
	private $_theNav;
	private $_theAdminNav;
	private $_currURL;
	// $login: true = display login forum, false = do not;
	private $loggedIn = false;
	private $admin = false;
	private $pages = array(
		'home.php' => 'Home',
		'about.php' => 'About',
		'contact.php' => 'Contact',
		'search.php' => 'Search',
	);
	private $adminPages = array(
		'contactData.php' => 'Data',
	);
	
	function __construct($currURL) {
		$this->_currPage = $currURL;
	}
	
	function setNavSection() {
		$returnVal = "";
		$returnVal .= "<!--This is Autogenerated by NavBar.php -->\n";
		$returnVal .= "<nav>\n";
		$returnVal .= " <div class='links'>\n";
		$returnVal .= " <ul>\n";
		foreach($this->pages as $filename => $pageTitle) {
			if($filename == $this->_currPage){
				$returnVal .= "  <li><a href='#' class='active'>$pageTitle</a></li>\n";
			}else{
				$returnVal .= "  <li><a href='$filename'>$pageTitle</a></li>\n";
			}
		}
		$returnVal .= $this->loginCode();
		$returnVal .= " </ul>\n";
		$returnVal .= " </div>\n";
		$returnVal .= "</nav>\n";
		
		$this->_theNav = $returnVal;
	}
	
	function getNav(){
		return $this->_theNav;
	}
	
	function loginCode(){
		$returnVal = "";
		if($this->loggedIn == true){
			$returnVal .= "<li class = 'login'><button onclick=\"location.href='../php/logout.php'; \">Log Out</button></li>\n";
		}else{
			$returnVal .= "<li class = 'login'><button onclick=\"document.getElementById('id00').style.display='block' \">Log In</button></li>\n";
		}
		
		return (string)$returnVal;
	}
	
	function setAdminNav(){
		$returnVal = "";
		$returnVal .= "<aside id='id01'>\n";
		$returnVal .= "<nav class='adminNav'>\n";
		$returnVal .= "	<div class='links'>\n";
		$returnVal .= "		<ul>\n";
		foreach($this->adminPages as $filename => $pageTitle) {
			if($filename == $this->_currPage){
				$returnVal .= "			<li><a href='#' class='active'>$pageTitle</a></li>\n";
			}else{
				$returnVal .= "			<li><a href='$filename'>$pageTitle</a></li>\n";
			}
		}
		$returnVal .= "		</ul>\n";
		$returnVal .= "	</div>\n";
		$returnVal .= "</nav>\n";
		$returnVal .= "</aside>\n";
		
		$this->_theAdminNav = $returnVal;
		
	}
	//id='adminNav'
	function getAdminNav(){
		return $this->_theAdminNav;
	}
	
	function setLog($fromSesVal){
		$this->loggedIn = $fromSesVal;
	}
	
	function getLog(){
		return $this->loggedIn;
	}
	
	function setAdmin($fromSesVal){
		$this->admin = $fromSesVal;
	}
	
	function getAdmin(){
		return $this->admin;
	}
	
	
	
	
	
}

// http://cnmtsrv2.uwsp.edu/~zfrye858/workingNav/home.php
// https://stackoverflow.com/questions/4908932/dynamic-navigation-in-php