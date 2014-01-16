<?php
include "connectdb.php";
include "isadmin.php";
include "profstatuschk.php";
if(!$profstatus)
{
$qry = mysql_fetch_array(mysql_query("SELECT * FROM useraccounts where username = '$username'"));
if($qry['username'] == $username)
{
	$useremail = $qry['email'];
}
	
//personal details
$phone = $_POST["phonenum"];
$mnumber = $_POST["mobilenum"];
$location = $_POST["curloc"];
$address = $_POST["curadd"];
$joblocation = $_POST["jobloc"];
$faname = $_POST["fathername"];
$moname = $_POST["mothername"];
$religion = $_POST["religion"];
$community = $_POST["community"];
$branch = $_POST["branch"];
$native = $_POST["native"];
$naadu = $_POST["naadu"];
$pattam = $_POST["pattam"];
$kottam = $_POST["kottam"];

//Reference Details
$relativename = $_POST["relname"];
$relativetype = $_POST["reltype"];
$relativenum = $_POST["relmobnum"];
$relativeaddress = $_POST["reladdress"];
$relativeemail = $_POST["relemail"];

//Professional Details
$jobcateg = $_POST["jobCategory"];
$totexpY = $_POST["totexpyear"];
$totexpM = $_POST["totexpmonth"];
$salaryL = $_POST["cursalarylac"];
$salaryT = $_POST["curslarythousands"];
$resumetitle = $_POST["resumehint"];

//Education Details
$ug = $_POST["ugcourse"];
$ugcollege = $_POST["ugcollege"];
$pg = $_POST["pgcourse"];
$pgcollege = $_POST["pgcollege"];
$phd = $_POST["phdandabove"];
$phdcollege = $_POST["phdcollege"];

//Resume Details
$fileName = $_FILES['resume']['name'];
$tmpName  = $_FILES['resume']['tmp_name'];
$fileSize = $_FILES['resume']['size'];
$fileType = $_FILES['resume']['type'];
$fileError = $_FILES["resume"]['error'];

//profile status
$personal = 1;
$reference = 1;
$professional = 1;
$edu = 1;
$resume = 1;

//personal details
if(mysql_query("insert into personaldetails(phone, mobile, location, address, joblocation, fathername, mothername, religion, community, branch, native, naddu, pattam, kottam, emailid) values('$phone','$mnumber', '$location', '$address', '$joblocation', '$faname', '$moname', '$religion', '$community', '$branch', '$native', '$naadu', '$pattam', '$kottam', '$useremail')"))
{
	$msg  = $msg."Personal Details added Sucessfully <br />";
	$personal = 0;
}
else
{
	$msg  = $msg."Personal Details adding error <br />";
}

//Reference Details Inserting
if(mysql_query("insert into referencedetails(relativename, relationship,  refermobile, referaddress, referemail, emailid) values('$relativename','$relativetype', '$relativenum', '$relativeaddress', '$relativeemail', '$useremail')"))
{
	$msg  = $msg."Reference Details added Sucessfully <br />";
	$reference = 0;
}
else
{
	$msg  = $msg."Reference Details adding error <br />";
}

//Professional Details inserting
if(mysql_query("insert into professionaldetails(jobcateg, totalexpyear,  totlaexpmonth, currentsallac, currentsalthousands, resumehead, emailid) values('$jobcateg','$totexpY', '$totexpM', '$salaryL', '$salaryT','$resumetitle', '$useremail')"))
{
	$msg  = $msg."Professional Details added Sucessfully <br />";
	$professional = 0;
}
else
{
	echo "Professional Details adding error <br />";
}

//Education Details inserting
if(mysql_query("insert into edudetails(ug, ugcollege,  pg, pgcollege, phd, phdcollege, emailid) values('$ug','$ugcollege', '$pg', '$pgcollege', '$phd', '$phdcollege', '$useremail')"))
{
	$msg  = $msg."Education Details added Sucessfully <br />";
	$edu = 0;
}
else
{
	$msg  = $msg."Education Details adding error <br />";
}

//Resume Details inserting
if($fileSize > 0 && $fileType == "application/msword")
{
	if($fileSize < 200000)
	{
		if($fileError > 0)
		{
			$msg  = $msg."Return Error Code = ".$fileError;
		}
		else
		{
			if (file_exists("../upload/" . $fileName))
			{
				$msg  = $msg.$fileName." already exists.<br /> ";
			}
			else
			{
				if(mysql_query("insert into resumedetails(filename, filetype, filesize, emailid) values ('$fileName', '$fileType', '$fileSize', '$useremail')"))
				{
					move_uploaded_file($tmpName , "../upload/" . $fileName );
					$msg  = $msg."Resume Stored Sucessfully" ;
					$resume = 0;
				}
				else
				{
					mysql_error();
				}
				
			}
		}
	}
	else
	{
		$msg  = $msg."file Size Exceed or Not Valid File <br />";
	}
}
else
{
	$msg  = $msg."please upload Valid File <br />";
}

if(mysql_query("insert into profilestatus(personal, reference, professional, edu, resume, emailid) values('$personal','$reference', '$professional','$edu','$resume', '$useremail')"))
{
	$msg  = $msg.true;
}
else
{
	$msg  = $msg.false;
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
}//profile status loop end
else
{
	header("Location: profile.php");
}
?>