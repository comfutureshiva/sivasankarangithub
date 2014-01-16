<br />
<?php
include "connectdb.php";
include "profstatuschk.php";
include "isadmin.php";
	
$getemail = $_REQUEST["custemail"];
if($getemail)
{
	$adminqry = mysql_fetch_array(mysql_query("select * from edudetails where emailid = '$getemail'"));
?>
		<div class="frmtitcont">
		<div class="frmtitle">Education Details</div>
		<div class="clrboth"></div>
	</div>
	<div class="frmfielddisp" >
		<div>
	<label>Basic/Graduation : </label>
	<em><?php echo $adminqry['ug']; ?>  <span style="padding-left:20px;"> College / University : </span><?php echo $adminqry['ugcollege']; ?> </em>
	</div>
	<div>
	<label>Post Graduation :</label>
	<em><?php echo $adminqry['pg']; ?>  <span style="padding-left:20px;"> College / University : </span> <?php echo $adminqry['pgcollege']; ?> </em>
	</div>
	<div>
	<label>Doctorate/Phd : </label>
	<em><?php echo $adminqry['phd']; ?>   <span style="padding-left:20px;"> College / University : </span> <?php echo $adminqry['phdcollege']; ?> </em>
	</div>
	</div> 
	<div class="clrboth"></div>
<?php
}
else
{
	$eduqry = mysql_fetch_array(mysql_query("select * from edudetails where emailid = '$useremail'"));
	if($eduqry['emailid'] == $useremail)
	{
?>
	<div class="frmtitcont">
		<div class="frmtitle">Education Details</div>
		<div class="reqtxt"><span class="editbutton"><a href="javascript:;" class="editicon" onclick="editperDetails('edu', 'edudiv');">Edit</a></span></div>
		<div class="clrboth"></div>
	</div>
	<div class="frmfielddisp" >
		<div>
	<label>Basic/Graduation : </label>
	<em><?php echo $eduqry['ug']; ?>  <span style="padding-left:20px;"> College / University : </span><?php echo $eduqry['ugcollege']; ?> </em>
	</div>
	<div>
	<label>Post Graduation :</label>
	<em><?php echo $eduqry['pg']; ?>  <span style="padding-left:20px;"> College / University : </span> <?php echo $eduqry['pgcollege']; ?> </em>
	</div>
	<div>
	<label>Doctorate/Phd : </label>
	<em><?php echo $eduqry['phd']; ?>   <span style="padding-left:20px;"> College / University : </span> <?php echo $eduqry['phdcollege']; ?> </em>
	</div>
	</div> 
	<div class="clrboth"></div>
<?php
	}
}
?>