<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
header("Access-Control-Allow-Origin: *");
?>


<script>

function kartenset_search() {

	//Credentials
	var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var apiname = "sYp4kEAtyUnH67K1";
	
	//Obligatory datainput
	var address = encodeURIComponent($('#kartenset_address').val());
	var kartenset_responsetype = $('#kartenset_responsetype').val();
	
	//Optional datainput
	var koord = $('#kartenset_koord').val().replace(' ','');

	//Requestername - For billing purposes; 
	var apirequester = encodeURIComponent("test@proptechtools.de");

	console.log(kartenset_responsetype)

	if(koord != ""){
		URL = "https://www.proptechapi.de/dte/kartenset/json?apiKey="+apikey+"&name="+apiname+"&requester="+apirequester+"&latlng="+koord+"&responseType="+kartenset_responsetype;
	}
	if(address != ""){
		URL = "https://www.proptechapi.de/dte/kartenset/json?apiKey="+apikey+"&name="+apiname+"&requester="+apirequester+"&latlng="+koord+"&address="+address+"&responseType="+kartenset_responsetype;
	}

	if(kartenset_responsetype == "doc"){
		
		window.location.href=URL;

	} else if (kartenset_responsetype == "data"){
		
		$.getJSON(URL, function(data) {
        console.log(data.message)
        if (data.success == true){
            $('#kartenset_text').html(data.data.html_text);
            console.log(data.data.html_text);
            //return;
        } else {
            $('#kartenset_text').html(data.message);
            console.log(data)
            //return;
        }
    })
	}
	console.log(URL)
	$('#kartenset_link').html("<a href="+URL+" target='_blank'>"+URL+"</a>");

}
</script>

</head>

<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right"></a>
<div style="height:20px"></div>
<a href="makro-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px">Makrolage-API</a>
<a href="mikro-api-easy.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Easy]</a>
<!--<a href="mikro-api-advanced.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Advanced]</a>-->
<a href="kartenset-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Kartenset-API</a>
<hr style="margin-top: 10px;">

<h2>PropTechApi - Developing and Testing Environment (DTE)</h2>

<h3 style="text-decoration: underline;">Anmeldedaten:</h3> 
Test-Apiname: <input readonly="readonly" type="text" id="user" value="sYp4kEAtyUnH67K1" disabled placeholder="">
Test-Apikey: <input readonly="readonly" type="text" id="key" value="gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU" disabled placeholder="">
Test-Requester: <input readonly="readonly" type="text" id="requester" value="test@proptechtools.de" disabled placeholder="">
<br>
<a style="font-style:italic">Bei Verwendung der eigenen Anmeldedaten muss "dte" in der URL entfernt werden: www.proptechapi.de/dte/kartenset/json... => www.proptechapi.de/kartenset/json...</a>

<br>
<h3 style="text-decoration: underline;">Api-Inputparameter:</h3> 
<h4>abfragbare Testdatensätze:</h4> 
<table> 
	<tr> 
		<th>ID</th> 
		<th>Gemeindeschlüssel</th> 
		<th>Ort-Art</th> 
		<th>Ort-Name</th> 
		<th>Bundesland</th> 
		<th>Beispiel Koordinate</th>
	</tr>

	<tr> 
		<td>1</td>
		<td>072355007001</td> 
		<td>Gemeinde</td> 
		<td>Aach</td> 
		<td>Rheinland-Pfalz</td>
		<td>49.789503, 6.590633</td>
	</tr>  

	<tr> 
		<td>2</td>
		<td>083355001001</td> 
		<td>Stadt</td> 
		<td>Aach</td> 
		<td>Baden-Württemberg</td> 
		<td>47.840882, 8.859067</td> 
	</tr> 

	<tr> 
		<td>3</td>
		<td>053340002002</td> 
		<td>Stadt</td> 
		<td>Aachen</td> 
		<td>Nordrhein-Westfalen</td> 
		<td>50.777180, 6.093335</td> 
	</tr>  

	<tr>
		<td>4</td> 
		<td>081365001088</td> 
		<td>Stadt</td> 
		<td>Aalen</td> 
		<td>Baden-Württemberg</td> 
		<td>48.837336, 10.094682</td> 
	</tr> 

	<tr> 
		<td>5</td>
		<td>064390001001</td> 
		<td>Gemeinde</td> 
		<td>Aarbergen</td> 
		<td>Hessen</td> 
		<td>50.245978, 8.078530</td> 
	</tr> 
</table>

<hr>

<h2 >Kartenset-API</h2>
<div id="kartenset_api">
	
	<div>Koordinate (Obligatorisch):</div>
	<input type="text" id="kartenset_koord" value="" placeholder="Koordinaten">
	<div>Adresse (Optional: Ersetzt die auf Basis der Koordinate automatisch analysierte Adresse durch die eingegebene Adresse):</div>
	<input type="text" id="kartenset_address" value="" placeholder="Adresse">
	<div>ResponseType (data/doc):</div>
	<select id="kartenset_responsetype">
		<option value="data">Data (Rohdaten)</option>
		<option value="doc">Doc (Word)</option>
	</select>
	<br>
	<br>
	<button onclick="kartenset_search()">Kartenset abrufen</button>
	<br>
	<br>
	<h3 style="text-decoration: underline;">Api-Ausgabe:</h3> 
	<div>Api-Link:</div>
	<div id="kartenset_link"></div>

</div>
<hr style="margin-bottom:30px">
</body>
</html>




