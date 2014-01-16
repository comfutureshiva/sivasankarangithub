<?php
include "connectdb.php";
$username = $_COOKIE["sessioncookie"];
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
$fileName = $_FILES['user_resume']['name'];
$tmpName  = $_FILES['user_resume']['tmp_name'];
$fileSize = $_FILES['user_resume']['size'];
$fileType = $_FILES['user_resume']['type'];
$fileError = $_FILES["user_resume"]["error"];


//personal details
if(mysql_query("insert into personaldetails(phone, mobile, location, address, joblocation, fathername, mothername, religion, community, branch, native, naddu, pattam, kottam, emailid) values('$phone','$mnumber', '$location', '$address', '$joblocation', '$faname', '$moname', '$religion', '$community', '$branch', '$native', '$naadu', '$pattam', '$kottam', '$useremail')"))
{
	echo "Personal Details added Sucessfully <br />";
}
else
{
	echo "Personal Details adding error <br />";
}

//Reference Details Inserting
if(mysql_query("insert into referencedetails(relativename, relationship,  refermobile, referaddress, referemail, emailid) values('$relativename','$relativetype', '$relativenum', '$relativeaddress', '$relativeemail', '$useremail')"))
{
	echo "Reference Details added Sucessfully <br />";
}
else
{
	echo "Reference Details adding error <br />";
}

//Professional Details inserting
if(mysql_query("insert into professionaldetails(jobcateg, totalexpyear,  totlaexpmonth, currentsallac, currentsalthousands, resumehead, emailid) values('$jobcateg','$totexpY', '$totexpM', '$salaryL', '$salaryT','$resumetitle', '$useremail')"))
{
	echo "Professional Details added Sucessfully <br />";
}
else
{
	echo "Professional Details adding error <br />";
}

//Education Details inserting
if(mysql_query("insert into edudetails(ug, ugcollege,  pg, pgcollege, phd, phdcollege, emailid) values('$ug','$ugcollege', '$pg', '$pgcollege', '$phd', '$phdcollege', '$useremail')"))
{
	echo "Education Details added Sucessfully <br />";
}
else
{
	echo "Education Details adding error <br />";
}
//Resume Details inserting
if($fileSize > 0 && fileType == "image/jpg")
{
	if($fileSize < 20000)
	{
		if($fileError > 0)
		{
			echo "Return Error Code = ", $fileError;
		}
		else
		{
			if (file_exists("../upload/" . $fileName))
			{
			  echo $fileName , " already exists.<br /> ";
			}
			else
			{
				move_uploaded_file($tmpName , "../upload/" . $fileName );
				echo "Stored in: ../upload/" , $fileName ;
			}
		}
	}
	else
	{
		echo "file Size Exceed or Not Valid File <br />";
	}
}
else
{
	echo "please upload Valid File <br />";
}
?>