<?php
	include "isadmin.php";
	if($isadmin != 2)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User Signup</title>
<?php
	include '../php/cssjsinclude.php';
?>
<script>
jQuery(function(){
	jQuery("#email").validate({
		expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
		message: "Please enter a valid Email ID"
	});
	jQuery("#fname").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter First Name"
	});
	jQuery("#usrname").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter username  Name"
	});
	jQuery("#password").validate({
		expression: "if (VAL.length > 2 && VAL) return true; else return false;",
		message: "Please enter a valid Password"
	});
	jQuery("#confpassword").validate({
		expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",
		message: "Confirm password field doesn't match the password field"
	});
	jQuery("#terms").validate({
		expression: "if(isChecked(SelfID)) return true; else return false;",
		message: "Please check terms and conditions"
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
                        	<li class="active"><a href="../php/register.php">Register</a></li>
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
	<?php
	if($username)
	{
		include "connectdb.php";
		$result=mysql_query("SELECT * FROM useraccounts where username='$username'");
		while($rowval = mysql_fetch_array($result))
		{
			$useremail = $rowval['email'];
			$firstname = $rowval['fname'];
			$lastname = $rowval['lname'];
		}
	?>
	<div class="registerfrm">
		<div class="">
                <div class="frmtitcont">
                    <div class="frmtitle"><?php echo $username ?> Details</div>
                    <div class="reqtxt"></div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
                        <label>Email address :</label>
                        <em><?php echo $useremail ?></em>
                    </div>
                    <div>
                        <label>First name :</label>
                        <em><?php echo $firstname ?></em>
                    </div>
                    <div>
                        <label>Last name :</label>
                        <em><?php echo $lastname ?></em>
                    </div>
                    <div>
                        <label>Desired Username :</label>
                        <em><?php echo $username ?></em>
                    </div>
					 <div>
                        <label>Password :</label>
                        <em> ******** <a href="changepasswd.php">Change Password</a></em>
                    </div>
					
                </div> 
            <div class="clrboth"></div>
         </div>
	</div>
	<?php
	}
	else
	{
	?>
    <div class="registerfrm"> 	
        <form  action="registerCheck.php" method="post" id="registerfrm">
            <input type="hidden" name="signupform" value="post">
            <div class="">
                <div class="frmtitcont">
                    <div class="frmtitle">New User Signup</div>
                    <div class="reqtxt"><span class="reqstar">*</span> Required Fields</div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfieldbg" >
                    <div>
                        <label><span class="reqstar">*</span>Email address :</label>
                        <em><input type="text" class="frmtextbox" name="email" id="email" onblur="checkEmail(this)"/></em>
                    </div>
                    <div>
                        <label><span class="reqstar">*</span> First name :</label>
                        <em><input type="text" class="frmtextbox" name="fname"  id="fname" /></em>
                    </div>
                    <div>
                        <label>Last name :</label>
                        <em><input type="text" class="frmtextbox" name="lname" id="lname" /></em>
                    </div>
                    <div>
                        <label><span class="reqstar">*</span> Desired Username :</label>
                        <em><input type="text" class="frmtextbox" name="username" id="usrname" onblur="checkUsername(this)" /></em>
                    </div>
                    <div>
                        <label><span class="reqstar">*</span> Choose a Password :</label>
                        <em><input type="password" class="frmtextbox" name="password" id="password" /></em>
                    </div>
                    <div>
                        <label><span class="reqstar">*</span>  Re-enter password :</label>
                        <em><input type="password" class="frmtextbox" name="confpassword" id="confpassword" /></em>
                    </div>
                    <div>
                        <label></label>
                        <em id="terms"><input type="checkbox" value="yes" name="terms"  id="terms_1" /> I agree to terms and conditions</em>
                    </div>
                    <div>
                        <label></label>
                        <em><input type="submit" value="Submit"  /><!--img src="../images/registerbut.png" height="27" width="101" id="registerbut" class="hand" --></em>
                    </div>
                </div> 
            <div class="clrboth"></div>
         </div>
        </form>
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
<div id="messageContainer" class="" style="display: none;">
        <div class="borderBox" style="z-index: 10000;">
            <div style="display: block;" class="fright whiteCloseButton" id="messageContainerClose" onclick="hideMessage();"></div>
            <div class="fleft icon"></div>
	    <div class="innerMessage"></div>
</div>
</div>
</body>
</html>
<?php
//isadmin check end
}
?>