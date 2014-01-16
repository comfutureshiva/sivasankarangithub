<?php
	include "connectdb.php";
	include "isadmin.php";
	include "profstatuschk.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Details</title>
<?php
	include 'cssjsinclude.php';
?>
</head>
<script language="javascript" type="text/javascript">

jQuery(function(){
	jQuery("#email").validate({
		expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
		message: "Please enter a valid Email ID"
	});
	jQuery("#phonenum").validate({
		expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
		message: "Please enter a valid number" 
	});
	jQuery("#mobilenum").validate({
		expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
		message: "Please enter a valid number"
	});
	jQuery("#curloc").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter username  Name"
	});
	jQuery("#jobloc").validate({
		expression: "if (VAL != '0') return true; else return false;",
		message: "Please select job location"
	 }); 
 });
</script>
<body>
<div class="totalcontainer" >
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
						<?php
						}
						if($isadmin == 1)
						{
						?>
							<li class="active"><a href="../php/profile.php">Profile</a></li>
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
<?php
	if($username)
	{
?>
<!-- form start -->
<br />
<br />

<div id="step0">
<?php

if($profstatus)
{
?>
	<div class="registerfrm">
		<div class="" id="personaldiv">
<?php	
	include "disp_perdetails.php"; 
?>
	   </div>
	</div>
<?php
}
if(!$profstatus)
{
?>	
<form method="post" action="profilecheck.php" name="personaldetails" id="personaldetails" enctype="multipart/form-data">
    <div class="frmcontainer">
    	<div class="frmtitcont">
        	<div class="frmtitle">Personal Details</div>
            <div class="reqtxt"><span class="reqstar">*</span> Required Fields</div>
            <div class="clrboth"></div>
        </div>
        <div class="frmfieldbg">
        	<div>
            	<label>Phone number :</label>
                <em><input type="text" class="frmtextbox" name="phonenum" id="phonenum" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Mobile number :</label>
                <em><input type="text" class="frmtextbox" name="mobilenum" id="mobilenum" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span>Current location :</label>
                <em><input type="text" class="frmtextbox" name="curloc" id="curloc" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Current Address  :</label>
                <em><textarea class="frmtextbox" name="curadd" id="curadd"></textarea></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Preferred job location :</label>
                <em>
                	<select multiple="multiple" size="4" class="frmtextbox" name="jobloc" id="jobloc">
                    	<option value="0"> - Select - </option>
                        <option value="Anywhere" selected="selected">Anywhere</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Trichy">Trichy</option>
                        <option value="Thanjavur">Thanjavur</option>
                        <option value="Madurai">Madurai</option>
                   </select>
                </em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Father Name :</label>
                <em><input type="text" class="frmtextbox" name="fathername" id="fathername" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Mother Name :</label>
                <em><input type="text" class="frmtextbox" name="mothername" id="mothername" /></em>
            </div>

            <div>
            	<label><span class="reqstar">*</span>  Religion :</label>
                <em><input type="text" class="frmtextbox" name="religion" id="religion" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Community :</label>
                <em><input type="text" class="frmtextbox" name="community" id="community" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Branch :</label>
                <em><input type="text" class="frmtextbox" name="branch" id="branch" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Native :</label>
                <em><input type="text" class="frmtextbox" name="native" id="native" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Naadu :</label>
                <em><input type="text" class="frmtextbox" name="naadu" id="naadu" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Pattam / Kilai :</label>
                <em><input type="text" class="frmtextbox" name="pattam" id="pattam" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Kottam :</label>
                <em><input type="text" class="frmtextbox" name="kottam" id="kottam" /></em>
            </div>
        </div>
        <div class="clrboth"></div>
     </div>
<!-- form End -->   
<?php
}
?>
<!-- form start -->
	<div class="registerfrm">
		<div class="" id="referdiv">
<?php	
			include "disp_refdetails.php";
?>
	   </div>
	</div>
<?php
if(!$profstatus)
{
?>
    <div class="frmcontainer">
    	<div class="frmtitcont">
        	<div class="frmtitle">Reference Details</div>
            <div class="clrboth"></div>
        </div>
        <div class="frmfieldbg">
        	<div>
            	<label><span class="reqstar">*</span>Relative Name :</label>
                <em><input type="text" class="frmtextbox" name="relname" id="relname" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Relationship :</label>
                <em><input type="text" class="frmtextbox" name="reltype" id="reltype" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span>Mobile Number :</label>
                <em><input type="text" class="frmtextbox" name=="relmobnum" id="relmobnum" /></em>
            </div>
            <div>
            	<label><span class="reqstar">*</span> Address :</label>
                <em><textarea class="frmtextbox" name="reladdress" id="reladdress"></textarea></em>
            </div>
            <div>
            	<label> Email Address :</label>
                <em><input type="text" class="frmtextbox" name="relemail" id="relemail" /></em>
            </div>
        </div>
        <div class="clrboth"></div>
     </div>
<!-- form End -->

<?php
}
?>
	<div class="registerfrm">
		<div class="" id="profdiv">
<?php	
	include "disp_profdetails.php";
?>
	   </div>
	</div>
<?php
if(!$profstatus)
{
?>
<!-- form start -->
   <div class="frmcontainer">
    	<div class="frmtitcont">
        	<div class="frmtitle">Professional Details</div>
            <div class="reqtxt"><span class="reqstar"></span></div>
            <div class="clrboth"></div>
        </div>
        <div class="frmfieldbg">
            <div>
            	<label><span class="reqstar">*</span> Job category :</label>
                <em>
				    <select name="jobCategory" size="4" multiple="multiple" class="frmtextbox">
                    	<option value="0"> -- Select -- </option>
                        <option value="Software, Hardware, EDP" selected="selected">Software, Hardware, EDP</option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing &amp; Communications">Marketing &amp; Communications</option>
                        <option value="Advertising, DM, PR, MR and Event Management">Advertising, DM, PR, MR and Event Management</option>
                        <option value="Entertainment / Media / Journalism">Entertainment / Media / Journalism</option>
                        <option value="Human Resource, Admin &amp; Recruitment">Human Resource, Admin &amp; Recruitment</option>
                        <option value="Purchase/ Supply Chain">Purchase/ Supply Chain</option>
                        <option value="Finance &amp; Accounts">Finance &amp; Accounts</option>
                        <option value="Banking">Banking</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Financial Services">Financial Services</option>
                        <option value="Legal/ Law">Legal/ Law</option>
                        <option value="Production/ Engg/ R&amp;D">Production/ Engg/ R&amp;D</option>
                        <option value="Pharmaceutical/ Biotechnology">Pharmaceutical/ Biotechnology</option>
                        <option value="Call Centre, BPO, Customer Service">Call Centre, BPO, Customer Service</option>
                        <option value="Telecom/ ISP">Telecom/ ISP</option>
                        <option value="Health Care">Health Care</option>
                        <option value="Hotels/ restaurants">Hotels/ restaurants</option>
                       <option value="Travel/ Airlines">Travel/ Airlines</option>
                       <option value="Retail Chains">Retail Chains</option>
                       <option value="Distribution &amp; Delivery/ Courier">Distribution &amp; Delivery/ Courier</option>
                       <option value="Export/ Import">Export/ Import</option>
                       <option value="Senior Management">Senior Management</option>
                       <option value="Oil &amp; Gas">Oil &amp; Gas</option>
                       <option value="Construction">Construction</option>
                       <option value="Others">Others</option>
                 </select>
                </em>
            </div>
        	<div>
            	<label><span class="reqstar">*</span>Total experience :</label>
                <em>
                	<select class="smalltextbox" name="totexpyear" id="totexpyear">
                    	<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select> Years
                    
                    <select class="smalltextbox" name="totexpmonth" id="totexpmonth">
                    	<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                     </select> Months
                </em>
            </div>            
            <div>
            	<label><span class="reqstar">*</span> Current Annual Salary :</label>
                <em>
                	<select class="smalltextbox" name="cursalarylac" id="cursalarylac">
                    	<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="15">14</option>
                        <option value="15+">15+</option>
                    </select> Lacs
                    
                    <select class="smalltextbox" name="curslarythousands" id="curslarythousands">
                        <option value="0">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                        <option value="60">60</option>
                        <option value="65">65</option>
                        <option value="70">70</option>
                        <option value="75">75</option>
                        <option value="80">80</option>
                        <option value="85">85</option>
                        <option value="90">90</option>
                        <option value="95">95</option>
                     </select> Thousands
                </em>
            </div>
            <div>
            	<label> Resume Headline :</label>
                <em>
                	<input type="text" class="frmtextbox" name="resumehint" id="resumehint" />
                    <span class="hint">Your Resume Headline is the first thing Recruiters will see</span>
                </em>
            </div>
        </div>
        <div class="clrboth"></div>
     </div>
<!-- form End -->
<?php
}
?>
	<div class="registerfrm">
		<div class="" id="edudiv">
<?php	
		include "disp_edudetails.php";
?>
	   </div>
	</div>
<?php
if(!$profstatus)
{
?>
<!-- form start -->
    <div class="frmcontainer">
    	<div class="frmtitcont">
        	<div class="frmtitle">Education Details</div>
            <div class="clrboth"></div>
        </div>
        <div class="frmfieldbg">
        	<div>

            	<label><span class="reqstar">*</span>Basic/Graduation :</label>
                <em>
                	<select name="ugcourse" id="ugcourse" class="frmtextbox">
                    	<option selected="selected" value="0">Select</option>
                        <option value="Not Pursuing Graduation">Not Pursuing Graduation</option>
                        <option value="B.A">B.A</option>
                        <option value="B.Arch">B.Arch</option>
                        <option value="BCA">BCA</option>
                        <option value="B.B.A">B.B.A</option>
                        <option value="B.Com">B.Com</option>
                        <option value="B.Ed">B.Ed</option>
                        <option value="BDS">BDS</option>
                        <option value="BHM">BHM</option>
                        <option value="B.Pharma">B.Pharma</option>
                        <option value="B.Sc">B.Sc</option>
                        <option value="B.Tech/B.E.">B.Tech/B.E.</option>
                        <option value="LLB">LLB</option>
                        <option value="MBBS">MBBS</option>
                        <option value="Diploma">Diploma</option>
                        <option value="BVSC">BVSC</option>
                        <option value="Other">Other</option>
                   </select>
                   <em>College / University <input type="text" class="frmtextbox" name="ugcollege" /></em>
                </em>
            </div>
            <div>
            	<label>Post Graduation  :</label>
                <em>
                	<select name="pgcourse" id="pgcourse" class="frmtextbox">
                    	<option selected="selected" value="0">Select</option>
                        <option value="CA">CA</option>
                        <option value="CS">CS</option>
                        <option value="ICWA" >ICWA</option>
                        <option value="Integrated PG">Integrated PG</option>
                        <option value="LLM" >LLM</option>
                        <option value="M.A">M.A</option>
                        <option value="M.Arch">M.Arch</option>
                        <option value="M.Com">M.Com</option>
                        <option value="M.Ed">M.Ed</option>
                        <option value="M.Pharma">M.Pharma</option>
                        <option value="M.Sc">M.Sc</option>
                        <option value="M.Tech">M.Tech</option>
                        <option value="MBA/PGDM">MBA/PGDM</option>
                        <option value="MCA">MCA</option>
                        <option value="MS">MS</option>
                        <option value="PG Diploma">PG Diploma</option>
                        <option value="MVSC">MVSC</option>
                        <option value="MCM">MCM</option>
                        <option label="Other">Other</option>
                     </select>
                     <em>College / University <input type="text" class="frmtextbox" name="pgcollege" id="pgcollege"/></em> 
                </em>
            </div>
            <div>
            	<label>Doctorate/Phd :</label>
                <em>
	                <select class="frmtextbox" name="phdandabove" id="phdandabove">
                    	<option selected="selected">Select</option>
                        <option value="Ph.D/Doctorate">Ph.D/Doctorate</option>
                        <option value="MPHIL">MPHIL</option>
                        <option value="Other">Other</option>
                    </select>
                </em>
                    <em>College / University <input type="text" class="frmtextbox" name="phdcollege" id="phdcollged" /></em>
            </div>
        </div>
        <div class="clrboth"></div>
     </div>
<!-- form End -->
<?php
}
?>
	<div class="registerfrm">
		<div class="" id="resumediv">
<?php	
	include "disp_resdetails.php";
?>
	   </div>
	</div><br />
<?php
if(!$profstatus)
{
?>

<!-- form start -->
    <div class="frmcontainer">
    	<div class="frmtitcont">
        	<div class="frmtitle">Upload Resume</div>
            <div class="clrboth"></div>
        </div>
        <div class="frmfieldbg">
        	<div>
            	<label><span class="reqstar">*</span>Detailed resume :</label>
                <em>
					<input type="file" class="frmtextbox" name="resume" id="resume" />
                </em>
            </div>
            <div>
            	<label></label>
            	<em><span class="hint">To Attach your resume: Click 'Browse' and find your 
                    resume in Microsoft Word format on your computer.</span></em>
            </div>
        </div>
        <div class="clrboth"></div><br />
        <div class="butdiv"><input type="Submit" class="buttoncls" value="Save" id="profilesubmit"  /></div>
     </div>

    <br />
	<br />       
 </form>
<?php
}
?>
<!-- Main Content End -->
</div>

<?php	
	}
?>
<!-- footer start -->
<?php
	include 'footer.php';
?>

<!-- footer end  -->
</div>

</body>
</html>
