<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

class Order {

protected $id = null;
protected $userid = null;
protected $total = null;
protected $numberofitems = null;
protected $dateadded = null;
protected $dateupdated = null;

function getId(){
	return $this->id;	
}

function getUserid(){
	return $this->userid;
}

function getTotal(){
	return $this->total;
}

function getNumberofitems(){
	return $this->numberofitems;
}

function getDateadded(){
	return $this->dateadded;
}

function getDateupdated(){
	return $this->dateupdated;
}

} //end class

?>

</body>
</html>