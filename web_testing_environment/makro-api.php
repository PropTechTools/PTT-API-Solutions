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
	var system = "dte";
    var apiKey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var name = "sYp4kEAtyUnH67K1";
	var requester = "test@proptechtools.de"

	//Obligatory parameters
	var latlng = $('#latlng').val()
	var objektkategorie = $('#objektkategorie').val()
	var textlength = $('#textlength').val()

	//Optional parameters
	var fazit = $('#fazit').val();
	var wirtschaftsstruktur1 = $('#wirtschaftsstruktur1').val();
	var wirtschaftsstruktur2 = $('#wirtschaftsstruktur2').val();
	var wirtschaftsstruktur3 = $('#wirtschaftsstruktur3').val();
	
	URL = "https://www.proptechapi.de/"+system+"/macrolage/json?"+
	"apiKey="+apikey+
	"&name="+name+
	"&requester="+requester+
	"&latlng="+latlng+
	"&objektkategorie="+objektkategorie+
	"&textlength="+textlength+
	"&fazit="+fazit+
	"&wirtschaftsstruktur1="+wirtschaftsstruktur1+
	"&wirtschaftsstruktur2="+wirtschaftsstruktur2+
	"&wirtschaftsstruktur3="+wirtschaftsstruktur3
	
    $('#macro_link').html("<a href="+URL+" target='_blank'>"+URL+"</a>");
    
    
    $.getJSON(URL, function(data) {
        console.log(data.message)
        if (data.success == true){
            $('#macro_text').html(data.data.html_text);
            console.log(data.data.html_text);
        } else {
            $('#macro_text').html(data.message);
            console.log(data)
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

<h2 >Makrolage-API</h2>

<h4>Obligatorischer Parameter:</h4>

<div>Koordinaten*</div>
<input type="text" id="latlng" value="" placeholder="Koordinaten">
<br>
<div>Objektkategorie* (Integration via Dropdownsearch wird empfohlen, vgl. PTT-Webplattform):</div>
<select id="objektkategorie" class="save">
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

<div>Textlänge*</div>
<select id="textlength">
	<option value="long">long</option>
	<option value="short">short</option>
</select> 

<br><br>

<h4>Optionale Parameter:</h4>
<div>Fazit:</div>
<select id="fazit">
	<option value="sehr_gut">Sehr gut</option>
	<option value="gut">Gut</option>
	<option value="mittel">Mittel</option>
	<option value="maessig">Mäßig</option>
	<option value="schlecht">Schlecht</option>
</select> 

<br><br>

<div id="wirtschaftsstruktur_div">
	<div>Wirtschaftsstruktur (Automatische Ausgabe bei Städten über 15.000 Einwohnern):</div>
	<br>
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




