<?php
	include "connectdb.php";
	$qry = mysql_fetch_array(mysql_query("select * from admin"));
	$adminuser = $qry["admin"];
	$adminpass = $qry["pass"];
	echo $adminuser;
	echo $adminpass;
?>