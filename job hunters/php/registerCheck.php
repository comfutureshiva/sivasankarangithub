<?php
include "connectdb.php";
include "isadmin.php";

$email=$_POST['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$username=$_POST['username'];
$userpwd=$_POST['password'];
$confpwd=$_POST['confpassword'];
$signupfrm=$_POST['signupform'];
$terms = $_POST['terms'];

if(isset($signupfrm) and $signupfrm=="post")
{
	$status = true;
	$msg = '';
	if(mysql_num_rows(mysql_query("select email from useraccounts where email = '$email'")))
	{
		$msg=$msg."Mail ID already exists. Please try another one <br />";
		$status= false;
	}
	if(mysql_num_rows(mysql_query("select username from useraccounts where username = '$username'")))
	{
		$msg=$msg."User Name already exists. Please try another one";
		$status= false;
	}
	if(strlen($userpwd) <= 2)
	{
		$msg=$msg."Password must be more than 3 char legth";
		$status = false;
	}
	if($userpwd <> $confpwd)
	{
		$msg=$msg."Both passwords are not matching";
		$status = false;
	}
	if($terms <> "yes")
	{
		$msg=$msg."You must agree to terms and conditions";
		$status = false;
	}
}
if(!$status)
{
	$msg;
	$login = false;
}
else
{
	if(mysql_query("insert into userAccounts(email, fname, lname, username, userpwd, confpwd) values('$email','$fname', '$lname', '$username', '$userpwd', '$confpwd')"))
	{
		include "session.php";
		include "newsession.php";
		$tm=date("Y-m-d H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];
		$rt=mysql_query("insert into session_details(id,userid,ip,tm) values('$_SESSION[id]','$username','$ip','$tm')");
		if(isadmin == 0)
		{
			setcookie("sessioncookie","$username", time()+360*24);
			
			$adminemail = "mugunthan@gmail.com";
			$adsubject = "New User Registered";
			$admessage = "<html><head></head><body><table border=\"1\" cellspacing=\"0\" cellpadding=\"10\" style=\"border-collapse:collapse\">
			  <tr>
				<td style=\"background:#E0ECFF\">Email</td>
				<td>$email</td>
			  </tr>
				<tr>
				<td style=\"background:#E0ECFF\">First Name</td>
				<td>$fname</td>
			  </tr>
			
			  <tr>
				<td style=\"background:#E0ECFF\">Last Name</td>
				<td>$lname</td>
			  </tr>
			
			  <tr>
				<td style=\"background:#E0ECFF\">User Name</td>
				<td>$username</td>
			  </tr>
			  </table></body></html>";
			  
			$msg = $msg."You have successfully signed up. Please Fill Profile Details";
			$to = '$email';
			$subject = "Sucessfully Registerd";
			$message = "Dear $username <br> You have Sucessfully Registered. Thank you for registering our site.";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			mail($to, $subject, $message, $headers);
			mail($adminemail, $adsubject, $admessage, $headers);
			header("Location: profile.php");
		}
	}
}

?>
<html>
<head>
<?php
	include '../php/cssjsinclude.php';
?>
</head>
<body>
<div class="totalcontainer">
    <!-- top Band -->
        <div class="topbandcont">
            <ul>
                <li class="topbandL"></li>
                <li class="topbandC">
                <div class="logo">
                    Job Hunters
                </div>
                <div class="menutab">
                    <ul>
                        <li class="active"><a href="../php/index.php">Home</a></li>
						<?php 
							if($isadmin != 2)
							{
						?>
                        	<li><a href="../php/register.php">Register</a></li>
							<li><a href="../php/profile.php">Profile</a></li>
						<?php
							}
							else if($isadmin == 2)
							{
						?>
								<li><a href="../php/admin.php">Admin</a></li>
						<?php
							}
						?>
                        <li><a href="../php/contactus.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="rightmenu">
                <?php
                if($isadmin == 1 || $isadmin == 2)
				{
				?>
                	<span id="logoutdiv">Welcome <span id="username"><?php echo $username ?></span> | <a style="display:inline; text-decoration:underline;" href="logout.php">Logut</a></span>
                <?php
                }
				else
				{
				?>
                    
                    	<div><a href="index.php">Login</a></div>
                <?php
				}
				?>
                 </div>
                </li>
                <li class="topbandR"></li>
            </ul>
        </div>
    <!-- topband End -->

    <!-- Main Content -->
    <div class="bodycontainer" id="maincontent">
        <br />
        <br />
			<div class="regstatus"> <?php echo $msg; ?> </div>
		<br />
		<br />
    <!-- Main Content End -->

<!-- footer start -->
 <?php
        include '../php/footer.php';
  ?>
<!-- footer end  -->
    </div>
</div>
</body>
</html>