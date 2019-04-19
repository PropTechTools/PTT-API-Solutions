<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
header("Access-Control-Allow-Origin: *");
?>


<style>
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
</style>


<script>
function macrolage_search() {
	//Credentials
	var key = $('#key').val()
	var usr = $('#user').val()
	
	//Required datainput
	var gemeindeschluessel = $('#gemeindeschluessel').val()
	var address = encodeURIComponent($('#address').val())
	var koord = $('#koord').val()


	var textlength = $('#textlength').val()
	var fazit = $('#fazit').val();
	
	//Requestername - For billing purposes; 
	var requester = "customer"
	
	if(koord != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+key+"&name="+usr+"&latlng="+koord+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(address != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+key+"&name="+usr+"&address="+address+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(gemeindeschluessel != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+key+"&name="+usr+"&communityKey="+gemeindeschluessel+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}


	$('#link').html("<a href="+URL+" target='_blank'>"+URL+"</a>");
	
	
	$.getJSON(URL, function(data) {
		console.log(data.message)
		if (data.success == true){
			$('#text').html(data.data.html_text);
			console.log(data.data.html_text);
			//return;
		} else {
			$('#text').html(data.message);
			console.log(data)
			//return;
		}
	})

			//$('#text').html("REST call failed: "+ URL);

}



</script>
</head>

<body>
<h2>PropTechApi - Developing and Testing Environment (DTE)</h2>

<h3 style="text-decoration: underline;">Anmeldedaten:</h3> 
Test-Apikey: <input readonly="readonly" type="text" id="user" value="test.user@proptechtools.de" disabled placeholder="">
Test-User: <input readonly="readonly" type="text" id="key" value="gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU" disabled placeholder="">
<br>
<br>
<br>
<br>

<h3 style="text-decoration: underline;">Api-Inputparameter:</h3> 
<h4>abfragbare Testdatensätze:</h4> 
<table> 
	<tr> 
		<th>ID</th> 
		<th>Gemeindeschlüssel</th> 
		<th>Gemeindeschluessel</th> 
		<th>Ort-Art</th> 
		<th>Ort-Name</th> 
		<th>Bundesland</th> 
	</tr>

	<tr> 
		<td>1</td>
		<td>072355007001</td> 
		<td>Gemeinde</td> 
		<td>Aach</td> 
		<td>Kiez</td> 
		<td>Rheinland-Pfalz</td> 
	</tr> 

	<tr> 
		<td>2</td>
		<td>083355001001</td> 
		<td>Stadt</td> 
		<td>Aach</td> 
		<td>Kiez</td> 
		<td>Baden-Württemberg</td> 
	</tr> 

	<tr> 
		<td>3</td>
		<td>053340002002</td> 
		<td>Stadt</td> 
		<td>Aachen</td> 
		<td>Kiez</td> 
		<td>Nordrhein-Westfalen</td> 
	</tr>  

	<tr>
		<td>4</td> 
		<td>081365001088</td> 
		<td>Stadt</td> 
		<td>Aalen</td> 
		<td>Kiez</td> 
		<td>Baden-Württemberg</td> 
	</tr> 

	<tr> 
		<td>5</td>
		<td>064390001001</td> 
		<td>Gemeinde</td> 
		<td>Aarbergen</td> 
		<td>Kiez</td> 
		<td>Hessen</td> 
	</tr> 
</table>

<h4>Gemeindeschlüssel/Adresse/Koordinaten</h4>
<input type="text" id="gemeindeschluessel" value="" placeholder="Gemeindeschlüssel">
<input type="text" id="address" value="" placeholder="Adresse">
<input type="text" id="koord" value="" placeholder="Koordinaten">
<br />

<h4>Textlänge</h4>
<select id="textlength">
  <option value="long">long</option>
  <option value="short">short</option>
</select> 
<br />

<h4>Fazit</h4>
<select id="fazit">
  <option value="sehr_gut">Sehr gut</option>
  <option value="gut">Gut</option>
  <option value="durchschnittlich">Durchschnittlich</option>
  <option value="maessig">Mäßig</option>
  <option value="schlecht">Schlecht</option>
</select> 
<br>
<br>
<button onclick="macrolage_search()">Makrolage abrufen</button>
<br>
<br>
<br>
<br>

<h3 style="text-decoration: underline;">Api-Ausgabe:</h3> 
<h4>Api-Link:</h4>
<div id="link"></div>
<h4>Textausgabe:</h4>
<div id="text" style="width:800px; height:400px; border-color:#000; border-style:solid; border-width:1px"></div>



</body>
</html>
