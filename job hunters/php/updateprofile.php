<?php
include "connectdb.php";
include "isadmin.php";
if($isadmin == 1)
{
	$qry = mysql_fetch_array(mysql_query("SELECT * FROM useraccounts where username = '$username'"));
	if($qry['username'] == $username)
	{
		$useremail = $qry['email'];
	}
	
	$val = $_REQUEST["val"];
	if($val == "personal")
	{
		$phone = $_REQUEST["ph"];
		$mnumber = $_REQUEST["cell"];
		$location = $_REQUEST["loc"];
		$address = $_REQUEST["add"];
		$joblocation = $_REQUEST["jobloc"];
		$faname = $_REQUEST["father"];
		$moname = $_REQUEST["mother"];
		$religion = $_REQUEST["religion"];
		$community = $_REQUEST["community"];
		$branch = $_REQUEST["branch"];
		$native = $_REQUEST["native"];
		$naadu = $_REQUEST["naadu"];
		$pattam = $_REQUEST["pattam"];
		$kottam = $_REQUEST["kottam"];
		
		if(mysql_query("update personaldetails set phone='$phone', mobile='$mnumber', location='$location', address='$address', joblocation='$joblocation', fathername='$faname', mothername='$moname', religion='$religion', community='$community', branch='$branch', native='$native', naddu='$naadu', pattam='$pattam', kottam='$kottam' where emailid='$useremail'"))
		{
			echo "['true','true','updateProfile(\'Personal Details updated Sucessfully\',\'disp_perdetails.php\', \'personaldiv\')' ]";
		}
		else
		{
			echo "['updating Error']";
		}
	}
	if($val == "reference")
	{
		$relna = $_REQUEST["relname"];
		$reltype = $_REQUEST["reltype"];
		$relmob = $_REQUEST["relmob"];
		$reladd = $_REQUEST["reladd"];
		$relemail = $_REQUEST["relemail"];
		if(mysql_query("update referencedetails set relativename='$relna', relationship='$reltype', refermobile='$relmob', referaddress='$reladd', referemail='$relemail' where emailid='$useremail'"))
		{
			echo "['true','true','updateProfile(\'Reference Details updated Sucessfully\',\'disp_refdetails.php\', \'referdiv\')' ]";
		}
		else
		{
			echo "['updating Error']";
		}
	}
	
	if($val == "prof")
	{
		$jobC = $_REQUEST["jobC"];
		$expY = $_REQUEST["expY"];
		$expM = $_REQUEST["expM"];
		$salL = $_REQUEST["salL"];
		$salT = $_REQUEST["salT"];
		$reshint = $_REQUEST["reshint"];
		
		if(mysql_query("update professionaldetails set jobcateg='$jobC', totalexpyear='$expY', totlaexpmonth='$expM', currentsallac='$salL', currentsalthousands='$salT', resumehead='$reshint' where emailid='$useremail'"))
		{
			echo "['true','true','updateProfile(\'Professionaldetails Details updated Sucessfully\',\'disp_profdetails.php\', \'profdiv\')' ]";
		}
		else
		{
			echo "['updating Error']";
		}
	}
	
	if($val == "edu")
	{
		$ug = $_REQUEST["ug"];
		$ugC = $_REQUEST["ugC"];
		$pg = $_REQUEST["pg"];
		$pgC = $_REQUEST["pgC"];
		$phd = $_REQUEST["phd"];
		$phdC = $_REQUEST["phdC"];
		
		if(mysql_query("update edudetails set ug='$ug', ugcollege='$ugC', pg='$pg', pgcollege='$pgC', phd='$phd', phdcollege='$phdC' where emailid='$useremail'"))
		{
			echo "['true','true','updateProfile(\'Education Details updated Sucessfully\',\'disp_edudetails.php\', \'edudiv\')' ]";
		}
		else
		{
			echo "['updating Error']";
		}
	}
	
	if($val == "res")
	{
//is admin check end
}
?>