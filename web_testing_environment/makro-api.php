<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="dynamic_dropdown.js"></script>
<script src="macro_display_input.js"></script>
<?php
header("Access-Control-Allow-Origin: *");
?>


<script>
function macrolage_search() {

    //Credentials
    var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var apiname = "sYp4kEAtyUnH67K1";
	var system = "dte";
	

	//Obligatory parameters
	var gemeindeschluessel = $('#macro_gemeindeschluessel').val()
	var address = encodeURIComponent($('#macro_address').val())
	var koord = $('#macro_koord').val()


	var textlength = $('#macro_textlength').val()

	//Optional parameters
	var fazit = $('#macro_fazit').val();
	var wirtschaftsstruktur1 = $('#wirtschaftsstruktur1').val();
	var wirtschaftsstruktur2 = $('#wirtschaftsstruktur2').val();
	var wirtschaftsstruktur3 = $('#wirtschaftsstruktur3').val();
	

	console.log(wirtschaftsstruktur1+wirtschaftsstruktur2+wirtschaftsstruktur3)
	//Requestername - For billing purposes; 
	var apirequester = "test@proptechtools.de"
	
	if(koord != ""){
		URL = "https://www.proptechapi.de/"+system+"/macrolage/json?apiKey="+apikey+
		"&name="+apiname+
		"&requester="+apirequester+
		"&latlng="+koord+
		"&textlength="+textlength+
		"&fazit="+fazit+
		"&wirtschaftsstruktur1="+wirtschaftsstruktur1+
		"&wirtschaftsstruktur2="+wirtschaftsstruktur2+
		"&wirtschaftsstruktur3="+wirtschaftsstruktur3
	}
	if(address != ""){
		URL = "https://www.proptechapi.de/dte/macrolage/json?apiKey="+apikey+
		"&name="+apiname+
		"&requester="+apirequester+
		"&address="+address+
		"&textlength="+textlength+
		"&fazit="+fazit+
		"&wirtschaftsstruktur1="+wirtschaftsstruktur1+
		"&wirtschaftsstruktur2="+wirtschaftsstruktur2+
		"&wirtschaftsstruktur3="+wirtschaftsstruktur3
	}
	if(gemeindeschluessel != ""){
		URL = "https://www.proptechapi.de/"+system+"/macrolage/json?apiKey="+apikey+
		"&name="+apiname+
		"&requester="+apirequester+
		"&communityKey="+gemeindeschluessel+
		"&textlength="+textlength+
		"&fazit="+fazit+
		"&wirtschaftsstruktur1="+wirtschaftsstruktur1+
		"&wirtschaftsstruktur2="+wirtschaftsstruktur2+
		"&wirtschaftsstruktur3="+wirtschaftsstruktur3
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
<!--<a href="mikro-api-advanced.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Advanced]</a>-->
<a href="kartenset-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Kartenset-API</a>
<hr style="margin-top: 10px;">

<h2>PropTechApi - Developing and Testing Environment (DTE)</h2>

<h3 style="text-decoration: underline;">Anmeldedaten:</h3> 
Test-Apiname: <input readonly="readonly" type="text" id="user" value="sYp4kEAtyUnH67K1" disabled placeholder="">
Test-Apikey: <input readonly="readonly" type="text" id="key" value="gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU" disabled placeholder="">
Test-Requester: <input readonly="readonly" type="text" id="requester" value="test@proptechtools.de" disabled placeholder="">
<br>
<a style="font-style:italic">Bei Verwendung der eigenen Anmeldedaten muss "dte" in der URL entfernt werden: www.proptechapi.de/dte/macrolage/json... => www.proptechapi.de/macrolage/json...</a>
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

<h4>Obligatorischer Parameter:</h4>

<div>Gemeindeschlüssel/Adresse/Koordinaten (Single Choice):</div>
	<input type="text" id="macro_gemeindeschluessel" value="" placeholder="Gemeindeschlüssel">
	<input type="text" id="macro_address" value="" placeholder="Adresse">
	<input type="text" id="macro_koord" value="" placeholder="Koordinaten">
<br />

<div>Textlänge:</div>
<select id="macro_textlength">
	<option value="long">long</option>
	<option value="short">short</option>
</select> 

<br><br>

<h4>Optionale Parameter:</h4>
<div>Fazit:</div>
<select id="macro_fazit">
	<option value="sehr_gut">Sehr gut</option>
	<option value="gut">Gut</option>
	<option value="mittel">Mittel</option>
	<option value="maessig">Mäßig</option>
	<option value="schlecht">Schlecht</option>
</select> 

<br><br>

<div id="wirtschaftsstruktur_div">
	<div>Wirtschaftsstruktur (Automatische Ausgabe bei Städten über 15.000 Einwohnern):</div>
	<a href="https://github.com/PropTechTools/PTT-API-Solutions/blob/master/doc/wirtschaftsstruktur_parameter.xlsx" target="_blank" style="color:#ff9800">wirtschaftsstruktur_parameter.xlsx</a>

	<br><br>

	<select id="wirtschaftsstruktur1"></select>
	<br>

	<select id="wirtschaftsstruktur2" style="display:none"></select>
	<br>

	<select id="wirtschaftsstruktur3" style="display:none"></select>
	<br><br>
</div>

<button onclick="macrolage_search()">Makrolage abrufen</button>

<br><br><br>

<h3 style="text-decoration: underline;">Api-Ausgabe:</h3> 
<div>Api-Link:</div>
<div id="macro_link"></div>
<div>Textausgabe:</div>
<div id="macro_text" style="width:800px; min-height:80px; border-color:#000; border-style:solid; border-width:1px, height:auto"></div>

<br>

<hr style="margin-bottom:30px">
</body>
</html>




