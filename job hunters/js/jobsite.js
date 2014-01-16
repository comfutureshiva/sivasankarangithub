// JavaScript Document
function checkEmail(txtbox)
{
	var emailval = trim(txtbox.value);
	if(emailval != "")
	{
		var url = "emailcheck.php?emailid="+emailval+"&emailvalidate="+1;
		getAjaxResponse(url, 'statusdiv');
	}
}

function checkUsername(txtbox)
{
	var username = trim(txtbox.value);
	if(username != "")
	{
		var url = "emailcheck.php?usrname="+username+"&emailvalidate="+0;
		getAjaxResponse(url, 'statusdiv');
	}
}

function downloadResume(fname, email)
{
	var url = "downloadresume.php?file="+fname+"&email="+email;
	getAjaxResponse(url, 'stausdiv');
}

function openDocument(filecont)
{
	alert(filecont);
}

function editperDetails(type, divid)
{
	var url="editprofile.php?val="+type;
	getAjaxpage(url, divid);
}

function setValue(id, val)
{
	var combobj = document.getElementById(id);
	for(i = 0; i < combobj.options.length; i++)
	{
		if(combobj.options[i].value == val)
		{
			combobj.options[i].selected = true;
		}
	}
}

function reloadProfile()
{
	window.location = '../php/profile.php';
}

function updatePersonalDetails(frm)
{
	jQuery(function(){
	/*jQuery("#email").validate({
		expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
		message: "Please enter a valid Email ID"
	});*/
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

	jQuery('#personalform').validated(function(){
		var phone = $("#phonenum").val();
		var mobile = $("#mobilenum").val();
		var location = $("#curloc").val();
		var address = $("#curadd").val();
		var joblocation = $("#jobloc").val();
		var faname = $("#fathername").val();
		var moname = $("#mothername").val();
		var rel = $("#religion").val();
		var community = $("#community").val();
		var branch = $("#branch").val();
		var native = $("#native").val();
		var naadu = $("#naadu").val();
		var pattam = $("#pattam").val();
		var kottam = $("#kottam").val();

		var url = "updateprofile.php?val=personal&ph="+phone+"&cell="+mobile+"&loc="+location+"&add="+address+"&jobloc="+joblocation+"&father="+faname+"&mother="+moname+"&religion="+rel+"&community="+community+"&branch="+branch+"&native="+native+"&naadu="+naadu+"&pattam="+pattam+"&kottam="+kottam;
		getAjaxResponse(url, 'stausdiv');
		});
	});

}

function updateReferenceDetails()
{
	jQuery(function(){
	jQuery("#relname").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter Relative  Name"
	});
	jQuery("#relmobnum").validate({
		expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
		message: "Please enter a valid number" 
	});

	jQuery('#referform').validated(function(){
		var relname = $("#relname").val();
		var reltype = $("#reltype").val();
		var relmobnum = $("#relmobnum").val();
		var reladd = $("#reladdress").val();
		var relemail = $("#relemail").val();

		var url = "updateprofile.php?val=reference&relname="+relname+"&reltype="+reltype+"&relmob="+relmobnum+"&reladd="+reladd+"&relemail="+relemail;
		getAjaxResponse(url, 'stausdiv');
		});
	});
}

function updateProfDetails()
{
	jQuery(function(){
	jQuery("#resumehint").validate({
		expression: "if (VAL) return true; else return false;",
		message: "Please enter Relative  Name"
	});

	jQuery('#proform').validated(function(){
		var jcatg = $("#jobCategory").val();
		var year = $("#totexpyear").val();
		var month = $("#totexpmonth").val();
		var lac = $("#cursalarylac").val();
		var thou = $("#curslarythousands").val();
		var hint = $("#resumehint").val();

		var url = "updateprofile.php?val=prof&jobC="+jcatg+"&expY="+year+"&expM="+month+"&salL="+lac+"&salT="+thou+"&reshint="+hint;
		getAjaxResponse(url, 'stausdiv');
		});
	});
}

function updateEduDetails()
{
	jQuery(function(){
	jQuery("#ugcourse").validate({
		expression: "if (VAL != '0') return true; else return false;",
		message: "Please select UG "
	});

	jQuery('#eduform').validated(function(){
		var ug = $("#ugcourse").val();
		var ugC = $("#ugcollege").val();
		var pg = $("#pgcourse").val();
		var pgC = $("#pgcollege").val();
		var phd = $("#phdandabove").val();
		var phdC = $("#phdcollge").val();

		var url = "updateprofile.php?val=edu&ug="+ug+"&ugC="+ugC+"&pg="+pg+"&pgC="+pgC+"&phd="+phd+"&phdC="+phdC;
		getAjaxResponse(url, 'stausdiv');
		});
	});
}

function updateResDetails()
{
	jQuery(function(){
	jQuery("#resume").validate({
		expression: "if (VAL != '0') return true; else return false;",
		message: "Please select File "
	});

	jQuery('#resumeform').validated(function(){
		var res = $("#resume").val();
		
		var url = "updateprofile.php?val=resume&filename="+res;
		getAjaxResponse(url, 'stausdiv');
		});
	});
}

function forgotPass()
{
	jQuery(function(){
	jQuery("#useremail").validate({
			expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
			message: "Please enter a valid Email ID"
		});
	jQuery('#forgotpass').validated(function(){
		var mailid = $("#useremail").val();
		
		var url = "forgotpwdchk.php?email="+mailid;
		getAjaxResponse(url, 'stausdiv');
		
		$("#useremail").val('');
		});
	});
}

function updateProfile(msg, file, divid)
{
	showMessage(msg, 0);
	getAjaxpage(file, divid);
}

function deleteCookie(cookie_name)
{
  var cookie_date = new Date ( );  // current date & time
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

window.onbeforeunload = function(){
	//deleteCookie('sessioncookie');
	}

function showUserDetails(email)
{
	$('#singlereportdiv').show();
	$('#allreportdiv').hide();
	
	var url ='disp_perdetails.php?custemail='+email+'';
	getAjaxpage(url, 'getperdetails');
	
	var url2 = 'disp_refdetails.php?custemail='+email+'';
	getAjaxpage(url2, 'getrefdetails');
	
	var url3 = 'disp_profdetails.php?custemail='+email+'';
	getAjaxpage(url3, 'getprofdetails');
	
	var url4 = 'disp_edudetails.php?custemail='+email+'';
	getAjaxpage(url4, 'getedudetails');
	
	var url5 = 'disp_resdetails.php?custemail='+email+'';
	getAjaxpage(url5, 'getresume');	
	
}