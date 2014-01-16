<?php
include "connectdb.php";
include "session.php";
include 'checkadmin.php';

$user = $_POST["username"];
$pass = $_POST["password"];

$user=mysql_real_escape_string($user);
$pass=mysql_real_escape_string($pass);
$tm=date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($loginfo=mysql_fetch_array(mysql_query("SELECT * FROM admintable WHERE adminuser='$user' AND adminpass = '$pass'")))
{
	if(($loginfo['adminuser']==$user)&&($loginfo['adminpass']==$pass))
	{
		include "newsession.php";
		//$sesionval = $_COOKIE["adsessioncookie"];
		if(!$sesionval)
		{
			setcookie("adsessioncookie","$user", time()+360*24);
			setcookie("sessioncookie");
			$msg = $msg."You have successfully login";
			include "isadmin.php";
			header("Location: admin.php");
		}
	}
	else
	{
		$msg = $msg."User Name or Password Incorrect";
	}
}
if($loginfo=mysql_fetch_array(mysql_query("SELECT * FROM useraccounts WHERE username='$user' AND userpwd = '$pass'")))
{
	if(($loginfo['username']==$user)&&($loginfo['userpwd']==$pass))
	{
		include "newsession.php";
		$rt=mysql_query("insert into session_details(id,userid,ip,tm) values('$_SESSION[id]','$user','$ip','$tm')");
		$sesionval = $_COOKIE["sessioncookie"];
		if(!$sesionval)
		{
			setcookie("sessioncookie","$user", time()+360*24);
			setcookie("adsessioncookie");
			$msg = $msg."You have successfully login. Please Fill Profile Details";
			include "isadmin.php";
			header("Location: profile.php");
		}
	}
	else
	{
		$msg = $msg."User Name or Password Incorrect";
	}
}
else
{
	$msg = $msg."User Name or Password Incorrect";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Job Hunters</title>
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
						<?php
						}
						if($username)
						{
						?>
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