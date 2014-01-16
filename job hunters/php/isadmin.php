<?php
	$username = $_COOKIE["sessioncookie"];
	$adusr = $_COOKIE["adsessioncookie"];
	
	$isadmin = 0;
	if($username)
	{
		$isadmin = 1;
		$username =  $_COOKIE["sessioncookie"];
	}
	else if($adusr)
	{
		$isadmin = 2;
		$username = $_COOKIE["adsessioncookie"];
	}
?>