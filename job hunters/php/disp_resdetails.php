<br />
<?php
include "connectdb.php";
include "profstatuschk.php";
include "isadmin.php";

$getemail = $_REQUEST["custemail"];
if($getemail)
{
	$adminqry = mysql_fetch_array(mysql_query("select * from resumedetails where emailid = '$getemail'"));
?>
	<div class="frmtitcont">
		<div class="frmtitle">Resume Details</div>
		<div class="clrboth"></div>
	</div>
	<div class="frmfielddisp" >
		<div>
			<label>Download Resume : </label>
				<em><a href="javascript:downloadResume('<?php echo $adminqry ['filename']; ?>', '<?php echo $adminqry['emailid']; ?>');"><?php echo $adminqry ['filename']; ?></a></em>
		</div>
	</div> 
	<div class="clrboth"></div>
<?php
}
else
{
	$resqry = mysql_fetch_array(mysql_query("select * from resumedetails where emailid = '$useremail'"));
	if($resqry['emailid'] == $useremail)
	{
?>
                <div class="frmtitcont">
                    <div class="frmtitle">Resume Details</div>
                   <div class="reqtxt"><span class="editbutton"><a href="javascript:;" class="editicon" onclick="editperDetails('resume', 'resumediv');">Edit</a></span></div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
            	<label>Download Resume : </label>
                <em><a href="javascript:downloadResume('<?php echo $resqry ['filename']; ?>', '<?php echo $resqry['emailid']; ?>');"><?php echo $resqry ['filename']; ?></a></em>
            </div>
  		 </div> 
            <div class="clrboth"></div>

<?php
	}
}
?>