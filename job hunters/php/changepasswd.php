<?php
include "isadmin.php";
if($isadmin == 1)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Job Hunters</title>
<?php
	include '../php/cssjsinclude.php';
?>
<script language="javascript" type="text/javascript">
jQuery(function(){
	
	jQuery("#oldpasswd").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter Current password"
	});
	jQuery("#newpasswd").validate({
		expression: "if (VAL.length > 2 && VAL) return true; else return false;",
		message: "Please enter a valid Password"
	});
	jQuery("#confirmpasswd").validate({
		expression: "if ((VAL == jQuery('#newpasswd').val()) && VAL) return true; else return false;",
		message: "Confirm password field doesn't match the password field"
	});
});
</script>
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
                        <li><a href="../php/index.php">Home</a></li>
						<?php 
							if($isadmin != 2)
							{
						?>
                        	<li><a href="../php/register.php">Register</a></li>
							<li class="active"><a href="../php/profile.php">Profile</a></li>
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
			<form action="changepasswdchk.php" method="post" id="changepasswd" name="changepasswd">
            <div class="frmfieldbg">
                <div>
                    <label>Current Password :</label>
                    <em><input type="password" class="frmtextbox" name="oldpasswd" id="oldpasswd" /></em>
                </div>
                <div>
                    <label>New Password :</label>
                    <em><input type="password" class="frmtextbox" name="newpasswd" id="newpasswd" /></em>
                </div> 
                <div>
                    <label>Confirm Password :</label>
                    <em><input type="password" class="frmtextbox" name="confirmpasswd" id="confirmpasswd" /></em>
                </div>
                <div>
                    <label></label>
                    <em><input type="submit" value="Submit"  /><!--img src="../images/loginbut.png" height="27" width="101" class="hand" onclick="document.loginfrm.submit();" --></em>
                </div>
            </div>
			</form>
        <br />
    <div class="clrboth"></div>

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
<?php
}
else
{
	header("Location: index.php");
}
?>