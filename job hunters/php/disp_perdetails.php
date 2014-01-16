<?php
	include "connectdb.php";
	include "profstatuschk.php";
	include "isadmin.php";

	$getemail = $_REQUEST["custemail"];
	if($getemail)
	{
		$adminqry = mysql_fetch_array(mysql_query("select * from personaldetails where emailid = '$getemail'"));
?>
<div class="frmtitcont">
                    <div class="frmtitle">Personal Details</div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
            	<label>Phone number :</label>
                <em><?php echo $adminqry['phone']; ?></em>
            </div>
            <div>
            	<label>Mobile number :</label>
                <em><?php echo $adminqry['mobile']; ?></em>
            </div>
            <div>
            	<label>Current location :</label>
                <em><?php echo $adminqry['location']; ?></em>
            </div>
            <div>
            	<label>Current Address  :</label>
                <em><?php echo $adminqry['address']; ?></em>
            </div>
            <div>
            	<label>Preferred job location :</label>
                <em>
                	<?php echo $adminqry['joblocation']; ?>
                </em>
            </div>
            <div>
            	<label>Father Name :</label>
                <em><?php echo $adminqry['fathername']; ?></em>
            </div>
            <div>
            	<label>Mother Name :</label>
                <em><?php echo $adminqry['mothername']; ?></em>
            </div>

            <div>
            	<label> Religion :</label>
                <em><?php echo $adminqry['religion']; ?></em>
            </div>
            <div>
            	<label>Community :</label>
                <em><?php echo $adminqry['community']; ?></em>
            </div>
            <div>
            	<label> Branch :</label>
                <em><?php echo $adminqry['branch']; ?></em>
            </div>
            <div>
            	<label>Native :</label>
                <em><?php echo $adminqry['native']; ?></em>
            </div>
            <div>
            	<label> Naadu :</label>
                <em><?php echo $adminqry['naddu']; ?></em>
            </div>
            <div>
            	<label>Pattam / Kilai :</label>
                <em><?php echo $adminqry['pattam']; ?></em>
            </div>
            <div>
            	<label>Kottam :</label>
                <em><?php echo $adminqry['kottam']; ?></em>
            </div>
        </div> 
            <div class="clrboth"></div>
<?php
	}
	else
	{
	$perqry = mysql_fetch_array(mysql_query("select * from personaldetails where emailid = '$useremail'"));
	if($perqry['emailid'] == $useremail)
	{
?>
       <div class="frmtitcont">
                    <div class="frmtitle">Personal Details</div>
                    <div class="reqtxt"><span class="editbutton"><a href="javascript:;" class="editicon" onclick="editperDetails('personal', 'personaldiv');">Edit</a></span></div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
            	<label>Phone number :</label>
                <em><?php echo $perqry['phone']; ?></em>
            </div>
            <div>
            	<label>Mobile number :</label>
                <em><?php echo $perqry['mobile']; ?></em>
            </div>
            <div>
            	<label>Current location :</label>
                <em><?php echo $perqry['location']; ?></em>
            </div>
            <div>
            	<label>Current Address  :</label>
                <em><?php echo $perqry['address']; ?></em>
            </div>
            <div>
            	<label>Preferred job location :</label>
                <em>
                	<?php echo $perqry['joblocation']; ?>
                </em>
            </div>
            <div>
            	<label>Father Name :</label>
                <em><?php echo $perqry['fathername']; ?></em>
            </div>
            <div>
            	<label>Mother Name :</label>
                <em><?php echo $perqry['mothername']; ?></em>
            </div>

            <div>
            	<label> Religion :</label>
                <em><?php echo $perqry['religion']; ?></em>
            </div>
            <div>
            	<label>Community :</label>
                <em><?php echo $perqry['community']; ?></em>
            </div>
            <div>
            	<label> Branch :</label>
                <em><?php echo $perqry['branch']; ?></em>
            </div>
            <div>
            	<label>Native :</label>
                <em><?php echo $perqry['native']; ?></em>
            </div>
            <div>
            	<label> Naadu :</label>
                <em><?php echo $perqry['naddu']; ?></em>
            </div>
            <div>
            	<label>Pattam / Kilai :</label>
                <em><?php echo $perqry['pattam']; ?></em>
            </div>
            <div>
            	<label>Kottam :</label>
                <em><?php echo $perqry['kottam']; ?></em>
            </div>
        </div> 
            <div class="clrboth"></div>
<?php
	}
}	
?>