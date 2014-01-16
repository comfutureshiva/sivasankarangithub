<?php
	include "connectdb.php";
	include "isadmin.php";
	if($isadmin == 2)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Job Hunters</title>
<?php
	include '../php/cssjsinclude.php';
?>
<script language="javascript" type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.tablesorter.pager.js"></script>
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
                        	<li><a href="../php/register.php">Register</a></li>
							<li><a href="../php/profile.php">Profile</a></li>
						<?php
							}
							else if($isadmin == 2)
							{
						?>
								<li class="active"><a href="../php/admin.php">Admin</a></li>
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
		<!--div class="regstatus">Registered User Details</div-->
		<div class="reportdiv" id="allreportdiv">
			<table width="100%" border="0" cellpadding="8" cellspacing="0" align="center" class="reporttbl" id="repTable">
			  <thead>
				  <tr>
					<th class="header">Name</th>
					<th class="header">E-Mail</th>
					<th class="header">Native</th>
					<th class="header">Community</th>
					<th class="header">Graduation</th>
					<th class="header">Resume Headline</th>
					<th class="header">Experience</th>
				  </tr>
				</thead>
				<tbody>
<?php
			$qry = mysql_query("SELECT * FROM useraccounts");
			while($getuser = mysql_fetch_array($qry))
			{
			$useremailid = $getuser['email'];
?>
			<tr class="hand usrtr" onclick="showUserDetails('<?php echo $getuser['email'] ?>')">
				<td><?php echo $getuser['fname'] ?></td>
				<td><?php echo $useremailid ?></td>
				<?php
				$perqry = mysql_fetch_array(mysql_query("select * from personaldetails where emailid = '$useremailid'"));
				if($perqry['emailid'] == $useremailid)
				{
				?>
				<td><?php echo $perqry['native']; ?></td>
				<td><?php echo $perqry['community']; ?></td>
				<?php
				}
				$eduqry = mysql_fetch_array(mysql_query("select * from edudetails where emailid = '$useremailid'"));
				if($eduqry['emailid'] == $useremailid)
				{
				?>
				<td><?php echo $eduqry['ug']; ?> </td>
				<?php
				}
				$profqry = mysql_fetch_array(mysql_query("select * from professionaldetails where emailid = '$useremailid'"));
				if($profqry['emailid'] == $useremailid)
				{
				?>
				<td><?php echo $profqry['resumehead']; ?></td>
				<td><?php echo $profqry['totalexpyear']; ?> Years <?php echo $profqry['totlaexpmonth']; ?> Month</td>

			</tr>
			<?php
					}
				}
			?>
				</tbody>
			</table>
		<div class="pager" id="pager">
			<form>
				<img class="first" src="../images/first.png">
				<img class="prev" src="../images/prev.png">
				<input type="text" class="pagedisplay">
				<img class="next" src="../images/next.png">
				<img class="last" src="../images/last.png">
				<select class="pagesize">
					<option value="10" selected="selected">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
					<option value="40">40</option>
				</select>
			</form>
			</div>
		</div>
<div id="singlereportdiv">
	<div id="getperdetails"></div>
	<div id="getrefdetails"></div>
	<div id="getprofdetails"></div>
	<div id="getedudetails"></div>
	<div id="getresume"></div>
</div>
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
<script>
$(document).ready(function() { 
    $("#repTable") 
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
}); 
</script>
<?php
}
else
{
	header("Location: index.php");
}
?>