<br />
<?php
include "connectdb.php";
include "profstatuschk.php";
include "isadmin.php";
	
$getemail = $_REQUEST["custemail"];
if($getemail)
{
	$adminqry = mysql_fetch_array(mysql_query("select * from professionaldetails where emailid = '$getemail'"));
?>
	<div class="frmtitcont">
		<div class="frmtitle">Professional Details</div>
		<div class="clrboth"></div>
	</div>
	<div class="frmfielddisp" >
		<div>
	<label>Job category :  </label>
	<em><?php echo $adminqry['jobcateg']; ?></em>
</div>
<div>
	<label>Total experience :</label>
	<em><?php echo $adminqry['totalexpyear']; ?> Years <?php echo $adminqry['totlaexpmonth']; ?> Month</em>
</div>
<div>
	<label>Current Annual Salary :  </label>
	<em><?php echo $adminqry['currentsallac']; ?> Lacs <?php echo $adminqry['currentsalthousands']; ?> Thousands</em>
</div>
<div>
	<label>Resume Headline :   </label>
	<em><?php echo $adminqry['resumehead']; ?></em>
</div>
</div> 
<div class="clrboth"></div>
<?php
}
else
{
$profqry = mysql_fetch_array(mysql_query("select * from professionaldetails where emailid = '$useremail'"));
if($profqry['emailid'] == $useremail)
{
?>
	<div class="frmtitcont">
		<div class="frmtitle">Professional Details</div>
		<div class="reqtxt"><span class="editbutton"><a href="javascript:;" class="editicon" onclick="editperDetails('prof', 'profdiv');">Edit</a></span></div>
		<div class="clrboth"></div>
	</div>
	<div class="frmfielddisp" >
		<div>
	<label>Job category :  </label>
	<em><?php echo $profqry['jobcateg']; ?></em>
</div>
<div>
	<label>Total experience :</label>
	<em><?php echo $profqry['totalexpyear']; ?> Years <?php echo $profqry['totlaexpmonth']; ?> Month</em>
</div>
<div>
	<label>Current Annual Salary :  </label>
	<em><?php echo $profqry['currentsallac']; ?> Lacs <?php echo $profqry['currentsalthousands']; ?> Thousands</em>
</div>
<div>
	<label>Resume Headline :   </label>
	<em><?php echo $profqry['resumehead']; ?></em>
</div>
</div> 
<div class="clrboth"></div>
<?php
	}
}
?>