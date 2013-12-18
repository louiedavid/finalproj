<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php

class User{
	//All attributes correspond to database columns
	//All attributes are protected.
	protected $userid = null;
	protected $firstnmae = null;
	protected $lastname = null;
	protected $middleinitial = null;
	protected $usertype = null;
	protected $username = null;
	protected $password = null;
	
	function getUserid(){
		return $this->userid;
	}
	function getFirstname(){
		return $this->firstname;	
	}
	function getLastname(){
		return $this->lastname;	
	}
	function getMiddleinitial(){
		return $this->middleinitial;
	}
	function getUsertype(){
		return $this->usertype;	
	}
	function getUsername(){
		return $this->username;	
	}
	function getPassword(){
		return $this->password;	
	}
	
	//Method returns the user ID:
	function getId() {
		return $this->id;
	}
	
	//Method returns a Boolean if the user us an administrator:
	function isAdmin() {
		return ($this->userType == 'admin');
	}
	
	//Method returns a Boolean indicating if the user is an administrator
	//or if the user is the original author of the provided page:
	function canEditPage(Page $page) {
		return ($this->isAdmin() || ($this->id == $page->getCreatorID()));
	}
	
	//Method returns a Boolean indicating if the user is an administrator or an author:
	function canCreatePage() {
		return ($this->isAdmin() || ($this->userType == 'author'));
	}
}

?>

</body>

</html>
