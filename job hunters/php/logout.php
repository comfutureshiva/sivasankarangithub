<?php
include "session.php";
include "connectdb.php"; // We must have db connection to change the status of plus_login
include "isadmin.php";
$q=mysql_query("update session_details set status='OFF' where id='$_SESSION[id]'");

session_unset();
session_destroy();
if($isadmin == 1)
{
	setcookie("sessioncookie");
}
else if($isadmin == 2)
{
	setcookie("adsessioncookie");
}

header("Location: index.php");

?>