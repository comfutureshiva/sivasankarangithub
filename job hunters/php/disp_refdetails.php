<br />
<?php
include "connectdb.php";
include "profstatuschk.php";
include "isadmin.php";

$getemail = $_REQUEST["custemail"];
if($getemail)
{
	$adminqry = mysql_fetch_array(mysql_query("select * from referencedetails where emailid = '$getemail'"));
?>
                <div class="frmtitcont">
                    <div class="frmtitle">Reference Details</div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
            	<label>Relative Name :</label>
                <em><?php echo $adminqry['relativename']; ?></em>
            </div>
            <div>
            	<label>Relationship :</label>
                <em><?php echo $adminqry['relationship']; ?></em>
            </div>
            <div>
            	<label>Mobile Number :</label>
                <em><?php echo $adminqry['refermobile']; ?></em>
            </div>
            <div>
            	<label>Address :</label>
                <em><?php echo $adminqry['referaddress']; ?></em>
            </div>
            <div>
            	<label>Email Address :</label>
                <em>
                	<?php echo $adminqry['referemail']; ?>
                </em>
            </div>
				
  		 </div> 
            <div class="clrboth"></div>
<?php
}
else
{
$refqry = mysql_fetch_array(mysql_query("select * from referencedetails where emailid = '$useremail'"));
if($refqry['emailid'] == $useremail)
{
?>
                <div class="frmtitcont">
                    <div class="frmtitle">Reference Details</div>
                    <div class="reqtxt"><span class="editbutton"><a href="javascript:;" class="editicon" onclick="editperDetails('reference', 'referdiv');">Edit</a></span></div>
                    <div class="clrboth"></div>
                </div>
                <div class="frmfielddisp" >
                    <div>
            	<label>Relative Name :</label>
                <em><?php echo $refqry['relativename']; ?></em>
            </div>
            <div>
            	<label>Relationship :</label>
                <em><?php echo $refqry['relationship']; ?></em>
            </div>
            <div>
            	<label>Mobile Number :</label>
                <em><?php echo $refqry['refermobile']; ?></em>
            </div>
            <div>
            	<label>Address :</label>
                <em><?php echo $refqry['referaddress']; ?></em>
            </div>
            <div>
            	<label>Email Address :</label>
                <em>
                	<?php echo $refqry['referemail']; ?>
                </em>
            </div>
				
  		 </div> 
            <div class="clrboth"></div>
<?php
	}
}
?>