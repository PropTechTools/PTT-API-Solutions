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
	var system = "dte";
	var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var name = "sYp4kEAtyUnH67K1";
	var requester = "test@proptechtools.de";

	//Obligatory datainput
	var latlng = $('#latlng').val().replace(' ','');
	var objektkategorie = $('#objektkategorie').val();
	var responseType = $('#responseType').val();

	//Requestername - For billing purposes; 
	URL = "https://www.proptechapi.de/"+system+"/kartenset/json?"+
	"apiKey="+apikey+
	"&name="+name+
	"&requester="+requester+
	"&latlng="+latlng+
	"&objektkategorie="+objektkategorie+
	"&responseType="+responseType;

	if(responseType == "doc"){	
		window.location.href=URL;
	} else if (responseType == "data"){	
		$.getJSON(URL, function(data) {
			console.log(data.message)
			if (data.success == true){
				$('#kartenset_text').html(data.data.html_text);
				console.log(data.data.html_text);
			} else {
				$('#kartenset_text').html(data.message);
				console.log(data)
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
		<td>49.789503,6.590633</td>
	</tr>  

	<tr> 
		<td>2</td>
		<td>083355001001</td> 
		<td>Stadt</td> 
		<td>Aach</td> 
		<td>Baden-Württemberg</td> 
		<td>47.840882,8.859067</td> 
	</tr> 

	<tr> 
		<td>3</td>
		<td>053340002002</td> 
		<td>Stadt</td> 
		<td>Aachen</td> 
		<td>Nordrhein-Westfalen</td> 
		<td>50.777180,6.093335</td> 
	</tr>  

	<tr>
		<td>4</td> 
		<td>081365001088</td> 
		<td>Stadt</td> 
		<td>Aalen</td> 
		<td>Baden-Württemberg</td> 
		<td>48.837336,10.094682</td> 
	</tr> 

	<tr> 
		<td>5</td>
		<td>064390001001</td> 
		<td>Gemeinde</td> 
		<td>Aarbergen</td> 
		<td>Hessen</td> 
		<td>50.245978,8.078530</td> 
	</tr> 
</table>

<hr>

<h2 >Kartenset-API</h2>
<div id="kartenset_api">
	
	<div>Koordinate* (Obligatorisch):</div>
	<input type="text" id="latlng" value="" placeholder="Koordinaten">
	<br>
	<div>Objektkategorie* (Integration via Dropdownsearch wird empfohlen, vgl. PTT-Webplattform):</div>
	<select id="objektkategorie">
		<option selected disabled value="">Objektart wählen..</option>
		<option value="abbaugrundstueck">Abbaugrundstück</option>
		<option value="aerztehaus">Ärztehaus</option>
		<option value="akutkrankenhaus">Akutkrankenhaus</option>
		<option value="appartmenthaus_boardinghaus">Appartment-/Boardinghaus</option>
		<option value="ausbildungsstaette">Ausbildungsstätte</option>
		<option value="ausstellungsgebaeude">Ausstellungsgebäude</option>
		<option value="autohaus">Autohaus</option>
		<option value="autohof">Autohof</option>
		<option value="badebetrieb">Badebetrieb</option>
		<option value="baumarkt">Baumarkt</option>
		<option value="betreutes_wohnen">Betreutes Wohnen</option>
		<option value="buero_und_geschaeftshaus">Büro- und Geschäftshaus</option>
		<option value="buerogebaeude">Bürogebäude</option>
		<option value="doppelhaushaelfte">Doppelhaushälfte</option>
		<option value="eigentumswohnung">Eigentumswohnung</option>
		<option value="einfamilienhaus">Einfamilienhaus</option>
		<option value="einfamilienhaus_mit_einliegerwohnung">Einfamilienhaus mit Einliegerwohnung</option>
		<option value="einfamilienhaus_mit_gewerbe">Einfamilienhaus mit Gewerbe</option>
		<option value="einkaufszentrum">Einkaufszentrum</option>
		<option value="fachmarktzentrum">Fachmarktzentrum</option>
		<option value="ferienwohnung_wochenendhaus">Ferienwohnung/Wochenendhaus</option>
		<option value="fitnesscenter">Fitnesscenter</option>
		<option value="fluechtlingsheim">Flüchtlingsheim</option>
		<option value="freizeitanlage">Freizeitanlage</option>
		<option value="garagengebaeude">Garagengebäude</option>
		<option value="geschaeftshaus">Geschäftshaus</option>
		<option value="gastronomiebetrieb">Gastronomiebetrieb</option>
		<option value="gewerbepark">Gewerbepark</option>
		<option value="golfplatz">Golfplatz</option>
		<option value="handwerksbetrieb">Handwerksbetrieb</option>
		<option value="hochregallager">Hochregallager</option>
		<option value="hotel">Hotel</option>
		<option value="kaufhaus_warenhaus">Kauf-/Warenhaus</option>
		<option value="kindergarten">Kindergarten</option>
		<option value="kinderheim">Kinderheim</option>
		<option value="kino">Kino</option>
		<option value="krankenhaus">Krankenhaus</option>
		<option value="lagergebaeude">Lagergebäude</option>
		<option value="landwirtschaftliche_hofstelle">Landwirtschaftliche Hofstelle</option>
		<option value="landwirtschaftliches_forstwirtschaftliches_grundstueck">Land-/Forstwirtschaftliches Grundstück</option>
		<option value="landwirtschaftsgebaeude">Landwirtschaftsgebäude</option>
		<option value="logistikzentrum">Logistikzentrum</option>
		<option value="medizinisches_versorgungszentrum">Medizinisches Versorgungszentrum</option>
		<option value="mehrfamilienhaus">Mehrfamilienhaus</option>
		<option value="mikroappartment">Mikroappartment</option>
		<option value="moebelmarkt">Möbelmarkt</option>
		<option value="parkhaus">Parkhaus</option>
		<option value="parkplatz">Parkplatz</option>
		<option value="pension">Pension</option>
		<option value="pflegeheim">Pflegeheim</option>
		<option value="plattenbau">Plattenbau</option>
		<option value="produktionsgebaeude">Produktionsgebäude</option>
		<option value="rehaklinik_kurklinik">Reha-/Kurklinik</option>
		<option value="reihenendhaus">Reihenendhaus</option>
		<option value="reihenmittelhaus">Reihenmittelhaus</option>
		<option value="reiterhof">Reiterhof</option>
		<option value="resthof">Resthof</option>
		<option value="sb_markt">SB-Markt</option>
		<option value="schule">Schule</option>
		<option value="sonstige_gewerbeimmobilie">Sonstige Gewerbeimmobilie</option>
		<option value="sonstige_industrieimmobilie">Sonstige Industrieimmobilie</option>
		<option value="studentenwohnheim">Studentenwohnheim</option>
		<option value="tankstelle">Tankstelle</option>
		<option value="teileigentum">Teileigentum</option>
		<option value="tiefgarage">Tiefgarage</option>
		<option value="unbebautes_grundstueck">Unbebautes Grundstück</option>
		<option value="veranstaltungshalle_kulturelle_einrichtung">Veranstaltungshalle/Kulturelle Einrichtung</option>
		<option value="verbrauchermarkt">Verbrauchermarkt</option>
		<option value="verkehrsbau">Verkehrsbau</option>
		<option value="waschanlage">Waschanlage</option>
		<option value="werkstattgebaeude">Werkstattgebäude</option>
		<option value="wohn_und_geschaeftshaus">Wohn- und Geschäftshaus</option>
		<option value="wohnanlage">Wohnanlage</option>
		<option value="wohnheim">Wohnheim</option>
		<option value="zweifamilienhaus">Zweifamilienhaus</option>
	</select>
	<div>ResponseType (data/doc):</div>
	<select id="responseType">
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




