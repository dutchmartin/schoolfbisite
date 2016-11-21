<?php
session_start();
// check login
if(!isset($_SESSION['username'])){
	header('Location: login.php?error=1');
}


// laad de header van de template
require_once "./header.php";
?>



<script>
 // function ajaxRequest, checks the browser and returns the right ajax object
 // @return httprequest object
 function ajaxRequest(){
 	var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 	if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
  		for (var i=0; i<activexmodes.length; i++){
   			try{
    		return new ActiveXObject(activexmodes[i])
   			}
			catch(e){
    		//suppress error
   			}
		}
	}
	else if (window.XMLHttpRequest) // if Mozilla, Safari etc
		return new XMLHttpRequest()
	else
  	return false
}

var cryptorequest=new ajaxRequest()
cryptorequest.onreadystatechange=function(){
 if (cryptorequest.readyState==4){
  if (cryptorequest.status==200 || window.location.href.indexOf("http")==-1){
   document.getElementById("crypt").value =cryptorequest.responseText
  }
  else{
   alert("An error has occured making the request")
  }
 }
}
function request(param, values)
{
var crypttext=document.getElementById("crypt").value
var parameters= values
var baseurl = "http://dutchmartin.nl/workspace/tests/schoolphp/encryptapi.php?"
cryptorequest.open("POST", baseurl + param, true)
cryptorequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
cryptorequest.send(parameters)
}
function textareatext()
{
	return "text=" + document.getElementById("crypt").value
}
function encrypt()
{
	var param = 'encrypt=1'
	request(param, textareatext())
}
function decrypt()
{
	var param = 'encrypt=0'
	request(param, textareatext())
}
  
</script>
</head>

<body>
<article>
  <div id="encrypt">
  <h1>coderen</h1>
  <form>
  <p>De geheime sleutel is op de server opgeslagen om de veiligheid van het gecodeerde bericht te waarborgen</p>
  
  <textarea id="crypt" name="message" rows="10" cols="30"></textarea>
  
  <br>
  
  <button type="button" onclick="encrypt()">encrypt</button>
  
  <button type="button" onclick="decrypt()">decrypt</button>
  
  </form>
  </div>
</article>
  
<?php
// laad de footer van de template
require_once "./footer.php";
?>