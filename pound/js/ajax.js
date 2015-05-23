/**
 * version      $Id$
 * package      Commission Calculator - Pound
 * subpackage   mod_commission_calc_pound
 * copyright    Copyright (C) 2009 Noxidsoft. All rights reserved.
 * license      GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * author       Noel Dixon <noel.dixon@noxidsoft.com>
 */

var xmlhttp

function showCalc1(str)
{
var url = location.href;
var base1 = url.substring(0, url.indexOf('/', 14));
var baseURL = base1 + "/";

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Your browser does not support XMLHTTP!");
  return;
  }
var percentBefore 	= document.getElementById("percentBefore").value;
var baseAmount 		= document.getElementById("baseAmount").value;
var percentAfter 	= document.getElementById("percentAfter").value;
var taxation 		= document.getElementById("taxation").value;
var url=baseURL + "modules/mod_commission_calc_pound/nonstdhelper.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
url=url+"&percentBefore="+percentBefore;
url=url+"&baseAmount="+baseAmount;
url=url+"&percentAfter="+percentAfter;
url=url+"&taxation="+taxation;
xmlhttp.onreadystatechange=stateChanged1;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged1()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  document.getElementById('txt2').value = document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  }
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}