<?php
	error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
	$servername = 'localhost';
	$dbusername = 'root';
	$dbpwd = '';
	$dbname = 'jobhunters';
	
	$con = mysql_connect($servername, $dbusername, $dbpwd);
	if(!$con){ die("could not connect db");}
	mysql_select_db("$dbname",$con) or die ("could not open db".mysql_error());
?>