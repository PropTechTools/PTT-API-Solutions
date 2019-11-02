<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
header("Access-Control-Allow-Origin: *");
?>


<script>
function macrolage_search() {

    //Credentials
    var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
    var apiname = "test.user@proptechtools.de";
    	
	//Required datainput
	var gemeindeschluessel = $('#macro_gemeindeschluessel').val()
	var address = encodeURIComponent($('#macro_address').val())
	var koord = $('#macro_koord').val()


	var textlength = $('#macro_textlength').val()
	var fazit = $('#macro_fazit').val();
	
	//Requestername - For billing purposes; 
	var apirequester = "PropTechTools_GmbH"
	
	if(koord != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+apikey+"&name="+apiname+"&latlng="+koord+"&requester="+apirequester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(address != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+apikey+"&name="+apiname+"&address="+address+"&requester="+apirequester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(gemeindeschluessel != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+apikey+"&name="+apiname+"&communityKey="+gemeindeschluessel+"&requester="+apirequester+"&textlength="+textlength+"&fazit="+fazit
	}

	console.log(URL)
    $('#macro_link').html("<a href="+URL+" target='_blank'>"+URL+"</a>");
    
    
    $.getJSON(URL, function(data) {
        console.log(data.message)
        if (data.success == true){
            $('#macro_text').html(data.data.html_text);
            console.log(data.data.html_text);
            //return;
        } else {
            $('#macro_text').html(data.message);
            console.log(data)
            //return;
        }
    })

}



function kartenset_search() {

	//Credentials
	var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var apiname = "test.user@proptechtools.de";
	
	//Obligatory datainput
	var address = encodeURIComponent($('#kartenset_address').val());
	var kartenset_responsetype = $('#kartenset_responsetype').val();
	
	//Optional datainput
	var koord = $('#kartenset_koord').val().replace(' ','');

	//Requestername - For billing purposes; 
	var apirequester = encodeURIComponent("PropTechTools_GmbH");

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

	
	//
}
</script>

</head>

<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right"></a>
<div style="height:20px"></div>

<hr style="margin-top: 45px;">
<h2>PropTechApi - Developing and Testing Environment (DTE)</h2>

<h3 style="text-decoration: underline;">Anmeldedaten:</h3> 
Test-User: <input readonly="readonly" type="text" id="user" value="test.user@proptechtools.de" disabled placeholder="">
Test-Apikey: <input readonly="readonly" type="text" id="key" value="gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU" disabled placeholder="">
<br>
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
<br>
<br>
<hr>
<h2 id="macro_heading" style="color:#ff9800; cursor: pointer;" onclick="$('#macro_api').toggle()">&#8226; Makrolage-API</h2>
<div id="macro_api" style="display:none">
	
	<div>Gemeindeschlüssel/Adresse/Koordinaten</div>
		<input type="text" id="macro_gemeindeschluessel" value="" placeholder="Gemeindeschlüssel">
		<input type="text" id="macro_address" value="" placeholder="Adresse">
		<input type="text" id="macro_koord" value="" placeholder="Koordinaten">
	<br />

	<div>Textlänge</div>
	<select id="macro_textlength">
		<option value="long">long</option>
		<option value="short">short</option>
	</select> 
	<br />

	<div>Fazit</div>
	<select id="macro_fazit">
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
	<div>Api-Link:</div>
	<div id="macro_link"></div>
	<div>Textausgabe:</div>
	<div id="macro_text" style="width:800px; min-height:80px; border-color:#000; border-style:solid; border-width:1px, height:auto"></div>

	<br>

</div>
<hr>
<h2 id="kartenset_heading" style="color:#ff9800; cursor: pointer;" onclick="$('#kartenset_api').toggle()">&#8226; Kartenset-API</h2>
<div id="kartenset_api" style="display:none">
	


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




