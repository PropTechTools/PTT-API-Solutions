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


</script>

</head>

<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right"></a>
<div style="height:20px"></div>
<a href="makro-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px">Makrolage-API</a>
<a href="mikro-api-easy.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Easy]</a>
<a href="mikro-api-advanced.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Advanced]</a>
<a href="kartenset-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Kartenset-API</a>
<hr style="margin-top: 10px;">

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

<hr>

<h2 >Makrolage-API</h2>
<div id="macro_api">
	
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
<hr style="margin-bottom:30px">
</body>
</html>



