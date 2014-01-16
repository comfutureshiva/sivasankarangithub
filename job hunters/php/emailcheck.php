<?php
include "connectdb.php";

$ifemail = $_REQUEST["emailvalidate"];

if($ifemail == 1)
{
	$email = $_REQUEST["emailid"];
	$email = mysql_real_escape_string($email);
	$isemail=mysql_fetch_array(mysql_query("SELECT * FROM useraccounts WHERE email='$email'"));
	if(($isemail['email']==$email))
	{
		echo "['Email ID already Exist']";
	}
	else
	{
		echo "['Available', true]";	
	}
}	
else if(ifemail == 0)
{
	$usrname = $_REQUEST["usrname"];
	$usrname = mysql_real_escape_string($usrname);
	$isusername=mysql_fetch_array(mysql_query("SELECT * FROM useraccounts WHERE username='$usrname'"));
	if(($isusername['username']==$usrname))
	{
		echo "['User Name already Exist']";
	}
	else
	{
		echo "['Available', true]";	
	}
}

?>