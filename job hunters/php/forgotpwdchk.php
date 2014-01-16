<?php
include "connectdb.php";
include "isadmin.php";

if($isadmin == 1 || $isadmin == 2)
{
	header("Location: home.php");
}
else
{
	$emailid = $_REQUEST["email"];
	$getuser = mysql_fetch_array(mysql_query("select * from useraccounts where email = '$emailid'"));
	if($getuser ['email'] == $emailid)
	{
		$usr = $getuser ['username'];
		$pass = $getuser ['userpwd'];
		
		$to = '$emailid';
		$subject = "Login Details";
		$message = "<html><head></head><body><table border=\"1\" cellspacing=\"0\" cellpadding=\"10\" style=\"border-collapse:collapse\">
		  <tr>
			<td style=\"background:#E0ECFF\">User Name</td>
			<td>$usr</td>
		  </tr>
			<tr>
			<td style=\"background:#E0ECFF\">Password</td>
			<td>$pass</td>
		  </tr>
		 </table></body></html>";
		 
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		if(mail($to, $subject, $message, $headers))
		{
			echo "['true','Please enter valid email id']";
		}
		else
		{
			echo "['Mail Sending failed']";
		}
	}
	else
	{
		echo "['Please enter valid email id']";
	}
	
}
?>

