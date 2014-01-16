<?php
	include "isadmin.php";
	$qry = mysql_fetch_array(mysql_query("SELECT * FROM useraccounts where username = '$username'"));
	if($qry['username'] == $username)
	{
		$useremail = $qry['email'];
	}
	$statusquery = mysql_fetch_array(mysql_query("select * from profilestatus where emailid = '$useremail'"));
	if($statusquery['emailid'] == $useremail)
	{
		$per = $statusquery['personal'];
		$ref = $statusquery['reference'];
		$prof = $statusquery['professional'];
		$ed = $statusquery['edu'];
		$res = $statusquery['resume'];
	}
$profstatus = false;
if($per != "" && $ref != "" && $prof != "" && $ed != "" && $res != "")
{
	if($per == 0 && $ref == 0 && $prof == 0 && $ed == 0 && $res == 0)
	{
		$profstatus = true;
	}
}
?>