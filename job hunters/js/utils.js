// JavaScript Document
function IsValidEmail(mailid)
{
	var mailRegExp  = /^[a-z0-9]([a-z0-9_\-\.\+]*)@([a-z0-9_\-\.]+)(\.[a-z]{2,3}){1,2}$/i; 
	return mailRegExp.test(mailid);
}

function showStatus(msg, status)
{
	var divobj = jQuery('#msgContainer'); 
	divobj.removeClass();
	var clsname = status == 0 ? 'success' : status == 1 ? 'failure' : status == 2 ? 'infomsg' : ''; //No I18n
	divobj.addClass(clsname);
	jQuery('div.innerMessage').html(msg) 
	divobj.fadeIn('slow');  //No I18n
	setTimeout('hideStatus()', 2000)
}

function hideStatus()
{
	jQuery('#msgContainer').hide();
}

/**
 * Retruns the x position of the given object in the window / screen.
 */
function findPosX(obj) {
	var curleft = 0;
	if (document.getElementById || document.all) {
		while (obj.offsetParent) {
			curleft += obj.offsetLeft;
			obj = obj.offsetParent;
		}
	} 
	else if (document.layers) {
		curleft += obj.x;
	}
	return curleft;
}

/**
 * Retruns the x position of the given object in the window / screen.
 */
function findPosY(obj) {
	var curtop = 0;
	if (document.getElementById || document.all) {
		while (obj.offsetParent) {
			curtop += obj.offsetTop;
			obj = obj.offsetParent;
		}
	} else if (document.layers) {
		curtop += obj.y;
	}
	return curtop;
}
function showMessage(msg, status)
{
	var divobj = $('#messageContainer');
	if(status == 0)
	{
		divobj.removeClass();
		divobj.addClass('success');
	}
	else if(status == 1)
	{
		divobj.removeClass();
		divobj.addClass('failure');
	}
	$('.innerMessage').html(msg) 
	divobj.fadeIn('slow');
	setTimeout('hideMessage()', 2000)

}
function hideMessage()
{
	$('#messageContainer').fadeOut('slow');
}

function trim(str)
{
  str = str.replace(/[\s]+$/g,"");
  str = str.replace(/^[\s]+/g,"");
  return str;
}