<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Job Hunters</title>
<?php
	include 'cssjsinclude.php';
	include 'isadmin.php';
?>
<script language="javascript" type="text/javascript">
jQuery(function(){
	jQuery("#username").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter Username Name"
	});
	jQuery("#password").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter password"
	});
});
</script>
</head>

<body>
<div class="totalcontainer">
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
						if($isadmin == 1)
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
		<?php
		if($username)
		{
		?>
		<div class="regstatus"> Welcome <?php echo $username; ?> </div>
		<?php
		}
		else
		{
		?>
        <div class="addtext">Submit your resume now, Free!</div>
        <div class="logincont">
			<form action="logincheck.php" method="post" id="loginfrm" name="loginfrm">
            <div class="frmfieldbg loginfrm">
                <div>
                    <label>User Name :</label>
                    <em><input type="text" class="frmtextbox" name="username" id="username" /></em>
                </div>
                <div>
                    <label>Password :</label>
                    <em><input type="password" class="frmtextbox" name="password" id="password" /></em>
                </div> 
                <div>
                    <label></label>
                    <em><a href="forgotpwd.php">Forgot Password ?</a></em>
                </div>
                <div>
                    <label></label>
                    <em><input type="submit" value="Submit"  /><!--img src="../images/loginbut.png" height="27" width="101" class="hand" onclick="document.loginfrm.submit();" --></em>
                </div>
            </div>
			</form>
        <br />
    <div class="clrboth"></div>
    </div>
<?php
}
?>

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