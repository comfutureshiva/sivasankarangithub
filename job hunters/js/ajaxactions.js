
function evalScript(divobj)
{
	var scriptobj = divobj.getElementsByTagName("SCRIPT");
	var scrarrlen = scriptobj.length; 
	for(idx = 0; idx < scrarrlen; idx++)
	{
		scrstr = scriptobj[idx].innerHTML; 
		eval(scrstr);
	}
}

function setMsgInDiv(divid, msg)
{
	if(divid && divid != '')
	{
		divobj = document.getElementById(divid);
		divobj.innerHTML = msg;
		evalScript(divobj);		
	}
}

// JavaScript Document
function getXMLHTTP()
{
	if(window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;

}

function evalrespose(msg)
{
	var evalstring = eval(msg);
	if(typeof(evalstring[1]) == "undefined")
	{
		showMessage(evalstring[0], 1);
		return false;
	}
	if(typeof(evalstring[2]) == "undefined")
	{
		showMessage(evalstring[0], 0);
		return false;
	}
	else
	{
		eval(evalstring[2]);
	}
	
}

function getAjaxResponse(url, divid)
{
	var busyimg = document.getElementById('loadingImg');
	var xmlhttp = getXMLHTTP();
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		//reponsediv.innerHTML=xmlhttp.responseText;
		evalrespose(xmlhttp.responseText);
		busyimg.style.display = 'none';
    }
	else
	{
		busyimg.style.display = 'block';
	}
  }
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

function evalScript(divobj)
{
	var scriptobj = divobj.getElementsByTagName("SCRIPT");
	var scrarrlen = scriptobj.length; 
	for(i = 0; i < scrarrlen; i++)
	{
		scrstr = scriptobj[i].innerHTML; 
		eval(scrstr);
	}
}

function setMsgInDiv(divid, msg)
{
	if(divid && divid != '')
	{
		divobj = document.getElementById(divid);
		divobj.innerHTML = msg;
		evalScript(divobj);		
	}
}

function getAjaxpage(url, divid)
{
	var busyimg = document.getElementById('loadingImg');
	var reponsediv = document.getElementById(divid);
	var xmlhttp = getXMLHTTP();
	xmlhttp.onreadystatechange=function()
	{
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		setMsgInDiv(divid, xmlhttp.responseText);
		//reponsediv.innerHTML=xmlhttp.responseText;
		busyimg.style.display = 'none';
    }
	else
	{
		busyimg.style.display = 'block';
	}
  }
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
