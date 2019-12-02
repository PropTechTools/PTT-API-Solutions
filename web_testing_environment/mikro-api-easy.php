<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="display_input.js"></script>
<script src="ptt_api.js"></script>

<?php
header("Access-Control-Allow-Origin: *");
?>

</head>

<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right;"></a>
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

<h2 >Mikrolage-API (Easy-Integration)</h2>
<li>Requesttime around <b>10 sec</b></li>
<li>User enters all userdata, all userdata is collected and requested in <b>one request</b> when pressing the button `Mikrolage abrufen`</li>
<li>* = obligatorischer Parameter </li>
<li><a href="micro_api_parameter.xlsx" target="_blank" style="color:#ff9800">Mikro-Api-Parameter Übersicht</a></li>
<br>
	
<hr>	
	<h4>1.	Innerörtliche Lage:</h4>
	<div>Bewertungsobjekt-Koordinaten* (50.771279,6.085676)</div>
	<input id="bewertungsobjekt" class="save" placeholder="Bewertungsobjekt-Koordinaten">
	<br>
	
	<div>Stadtzentrum-Koordinaten* (50.775396,6.086234)</div>
	<input id="stadtzentrum" class="save" placeholder="Stadtzentrum-Koordinaten">
	<br>

	<div>Objektkategorie* (Integration via Dropdownsearch wird empfohlen):</div>
	<select id="objektkategorie" class="save">
		<optgroup label="Textkategorie #1"></optgroup>
			<option value="1">Einfamilienhaus</option>
			<option value="1">Einfamilienhaus_mit_Einliegerwohnung</option>
			<option value="1">Einfamilienhaus_mit_Gewerbe</option>
			<option value="1">Zweifamilienhaus</option>
			<option value="1">Doppelhaushaelfte</option>
			<option value="1">Reihenhaus</option>
			<option value="1">Mehrfamilienhaus</option>
			<option value="1">Wohnanlage</option>
			<option value="1">Plattenbau</option>
			<option value="1">Eigentumswohnung</option>
			<option value="1">Wohn_und_Geschaeftshaus_ueberwiegend_Wohnen</option>
			<option value="1">Fluechtlingsheim</option>
			<option value="1">Mikroappartment</option>
			<option value="1">Studentenwohnheim</option>
		<optgroup label="Textkategorie #2"></optgroup>
			<option value="2">Aerztehaus</option>
			<option value="2">Medizinisches_Versorgungszentrum</option>
			<option value="2">Wohn_und_Geschaeftshaus_ueberwiegend_Gewerbe</option>
			<option value="2">Buero_und_Geschaeftshaus</option>
			<option value="2">Buerogebaeude</option>
			<option value="2">Gewerbliches_Teileigentum</option>
			<option value="2">Reiterhof</option>
			<option value="2">Landwirtschaftsgebaeude</option>
			<option value="2">Landwirtschaftliche_Hofstelle</option>
		<optgroup label="Textkategorie #3"></optgroup>
			<option value="3">SB_Markt</option>
			<option value="3">Baumarkt</option>
			<option value="3">Moebelmarkt</option>
			<option value="3">Verbrauchermarkt</option>
			<option value="3">Fachmarktzentrum</option>
			<option value="3">Kaufhaus_Warenhaus</option>
			<option value="3">Einkaufszentrum</option>
			<option value="3">Handwerksbetrieb</option>
			<option value="3">Werkstattgebaeude</option>
			<option value="3">Sonstige_Gewerbeimmobilie</option>
			<option value="3">Gewerbepark</option>
			<option value="3">Industrieimmobilie</option>
			<option value="3">Produktionsgebaeude</option>
			<option value="3">Lagergebaeude</option>
			<option value="3">Hochregallager</option>
			<option value="3">Logistikzentrum</option>
			<option value="3">krankenhaus</option>
			<option value="3">Akutkrankenhaus</option>
			<option value="3">Freizeitanlage</option>
			<option value="3">Fitnesscenter</option>
			<option value="3">Kino</option>
			<option value="3">Golfplatz</option>
			<option value="3">Badebetrieb</option>
			<option value="3">Autohaus</option>
			<option value="3">Tankstelle</option>
			<option value="3">Autohof</option>
			<option value="3">Waschanlage</option>
			<option value="3">Garagengebaeude</option>
			<option value="3">Tiefgarage</option>
			<option value="3">Parkhaus</option>
			<option value="3">Parkplatz</option>
			<option value="3">Verkehrsbau</option>
			<option value="3">Ausstellungsgebaeude</option>
			<option value="3">Ausbildungsstaette</option>
			<option value="3">Veranstaltungshalle_Kulturelle_Einrichtung</option>
			<option value="3">Abbaugrundstueck</option>
			<option value="3">Resthof</option>
			<option value="3">Landwirtschaftliches_Forstwirtschaftliches_Grundstueck</option>
			<option value="3">Unbebautes_Grundstueck</option>
		<optgroup label="Textkategorie #4"></optgroup>
			<option value="4">Rehaklinik_Kurklinik</option>
			<option value="4">Pflegeheim</option>
			<option value="4">Betreutes_Wohnen</option>
			<option value="4">Wohnheim</option>
		<optgroup label="Textkategorie #5"></optgroup>
			<option value="5">Hotel_bis_3_Sterne</option>
			<option value="5">Hotel_ab_4_Sterne</option>
			<option value="5">Ferienwohnung_Wochenendhaus</option>
			<option value="5">Pension</option>
			<option value="5">Appartmenthaus</option>
			<option value="5">Gastronomiebtrieb</option>
		<optgroup label="Textkategorie #6"></optgroup>
			<option value="6">Kindergarten</option>
			<option value="6">Kinderheim</option>
		<optgroup label="Textkategorie #7"></optgroup>
			<option value="7">Schule</option>
	</select>
	<br>
	<a href="object_categories.xlsx" target="_blank" style="color:#ff9800">Welche Textausgabe gibt es in den jeweiligen Textkategorien? -> Excelübersicht herunterladen!</a>
</div>

<!--MICROLAGE BEARBEITUNG-->  
<hr>          
<div id="Bearbeitung_micro">

	<h4>1.	Innerörtliche Lage:</h4>
	<select id="inneroertliche_lage" class="save">
		<option value="">Keine Angabe</option>
		<option value="zentrum">Zentrum</option>
		<option value="teil" selected>Stadteil</option>
		<option value="aussenbereich">Außenbereich</option>
	</select> 
	<br>
	<div id="div_fussgaengerzone" style="display:none">
		<input id="fussgaengerzone" class="save" type="checkbox"/>
		<label for="fussgaengerzone"><span>Befindet sich das Bewertungsobjekt in einer Fußgängerzone?</span></label>
	</div>
	<div id="div_separiert">
		<input id="separiert" type="checkbox" class="save"/>
		<label for="separiert"><span>Stadt-/Ortsteil vom übrigen Ortsgebiet abgegrenzt?</span></label>
	</div>
	<div id="div_randlage">
		<input id="randlage" type="checkbox" class="save"/>
		<label for="randlage"><span>Lage im Stadt-/Ortsrandbereich?</span></label>
	</div>

	<div><h4>2. Art der baulichen Nutzung:</h4></div>
	<select id="flaechennutzung" class="save">
		<option disabled selected value="">Bitte wählen..</option>
		<option value="">Keine Angabe</option>
		<option value="allgemeines_wohngebiet">Allgemeines Wohngebiet</option>
		<option value="besonderes_wohngebiet">Besonderes Wohngebiet</option>
		<option value="reines_wohngebiet">Reines Wohngebiet</option>
		<option value="wohngebiet">Wohngebiet</option>
		<option value="dorfgebiet">Dorfgebiet</option>
		<option value="kerngebiet">Kerngebiet</option>
		<option value="kleinsiedlungsgebiet">Kleinsiedlungsgebiet</option>
		<option value="gewerbegebiet">Gewerbegebiet</option>
		<option value="mischgebiet">Mischgebiet</option>
		<option value="industriegebiet">Industriegebiet</option>
		<option value="sondergebiet">Sondergebiet</option>
		<option value="sanierungsgebiet">Sanierungsgebiet</option>
	</select>
	
	<input id="gewerbegebiet_name" class="save" style="display:none" placeholder="Name des Gewerbegebiets?">
	<input id="industriegebiet_name" class="save" style="display:none" placeholder="Name des Industriegebiets?">
	

	<h4>3. Geographische Besonderheit:</h4>
	<select id="geografische_besonderheit" class="save">
		<option disabled selected value="">Bitte wählen..</option>
		<option value="">Keine Angabe</option>
		<option value="autobahn">Autobahn</option>
		<option value="bundesstrasse">Bundesstraße</option>
		<option value="hauptverkehrsader">Hauptverkehrsader</option>
		<option value="hauptstrasse">Hauptstraße</option>
		<option value="durchgangsstrasse">Durchgangsstraße</option>
		<option value="bahntrasse">Bahntrasse</option>
		<option value="bahnhof">Bahnhof</option>
		<option value="sbahnhof">S-Bahnhof</option>
		<option value="ubahnhof">U-Bahnhof</option>
		<option value="flughafen">Flughafen</option>
		<option value="flugplatz">Flugplatz</option>
		<option value="hafen">Hafen</option>
		<option value="fussgaengerzone">Fußgängerzone</option>
		<option value="platz">Platz</option>
		<option value="rathaus">Rathaus</option>
		<option value="krankenhaus">Krankenhaus</option>
		<option value="schule">Schule</option>
		<option value="kirche">Kirche</option>
		<option value="friedhof">Friedhof</option>
		<option value="gewerbegebiet">Gewerbegebiet</option>
		<option value="industriegebiet">Industriegebiet</option>
		<option value="sport_freizeitanlage">Sport-/Freizeitanlage</option>
		<option value="naturschutzgebiet">Naturschutzgebiet</option>
		<option value="erholungsgebiet">Erholungsgebiet</option>                       
		<option value="parkanlage">Parkanlage</option>
		<option value="gewaesser">Gewässer</option>
		<option value="wald">Wald</option>
		<option value="gebirge">Berge</option>                   
	</select>
	
	
	<select id="geografische_besonderheiten_praezisierung_gewaesser" class="save" style="display:none">
		<option value="bach">Bach</option>
		<option value="fluss">Fluss</option>
		<option value="kanal">Kanal</option>
		<option value="see">See</option>
	</select>
	
	<input id="geografische_besonderheiten_praezisierung" class="save" style="display:none">
		

	<div style="margin-top:30px"><h4>4. Lärmbelastung:</h4></div>

	<select id="laermbelastung" class="save">
		<option selected="selected" value="">Keine Angabe</option>
		<option value="gering">Gering</option>
		<option value="mittel">Mittel</option>
		<option value="hoch">Hoch</option>
	</select>
	    

	<div id="div_laermbelastung_grund" style="display:none">
		<p>Grund:</p>
		<select id="laermbelastung_grund" class="save">
			<option disabled selected value="">Bitte wählen..</option>
			<option value="">Keine Angabe</option>
			<option value="autobahn">Autobahn</option>
			<option value="bundesstraße">Bundesstraße</option>
			<option value="hauptverkehrsader">Hauptverkehrsader</option>
			<option value="hauptstraße">Hauptstraße</option>
			<option value="durchgangsstraße">Durchgangsstraße</option>
			<option value="bahntrasse">Bahntrasse</option>
			<option value="bahnhof">Bahnhof</option>
			<option value="sbahnhof">S-Bahnhof</option>
			<option value="ubahnhof">U-Bahnhof</option>
			<option value="flughafen">Flughafen</option>
			<option value="flugplatz">Flugplatz</option>
			<option value="hafen">Hafen</option>
			<option value="krankenhaus">Krankenhaus</option>
			<option value="schule">Schule</option>
			<option value="kirche">Kirche</option>
			<option value="gewerbegebiet">Gewerbegebiet</option>
			<option value="industriegebiet">Industriegebiet</option>
			<option value="innenstadtlage">Innenstadtlage</option>
		</select>
	</div>

	<input id="laermbelastung_grund_praezisierung" class="save" style="display:none">


    <!--5. Umgebungsbebauung-->    
	<hr>        
    <div id="umgebungsbebauung">

		<div><h4>5. Umgebungsbebauung:</h4></div>
					
		<h5 style="padding-top:15px;">Gebäudeart (I):</h5>
		<select id="umgebungsbebauung1" class="save"></select>
        
		<div id="div_umgebungsbebauung" style="display:none">  
			<select id="wohnwirtschaftliche_nutzung1" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="villen">Villen</option>
				<option value="einfamilienhaeuser">Einfamilienhäuser</option>
				<option value="zweifamilienhaeuser">Zweifamilienhäuser</option>
				<option value="doppelhäuser">Doppelhäuser</option>
				<option value="mehrfamilienhaeuser">Mehrfamilienhäuser</option>
				<option value="reihenhaeuser">Reihenhäuser</option>
				<option value="wohnblocks">Wohnblocks</option>
			</select>  
			
			<select id="gewerbliche_nutzung1" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="buero_und_geschaeftshaeuser">Büro-/ und Geschäftshäuser</option>
				<option value="buerogebaeude">Bürogebäude</option>
				<option value="geschaeftshaeuser">Geschäftshäuser</option>
				<option value="gewerbe_und_industriegebaeude">Gewerbe-/ und Industriegebäude</option>
				<option value="landwirtschaftsgebaeude">Landwirtschaftsgebäude</option>
			</select>

			<select id="mischnutzung1" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="wohn_und_geschaeftshaeuser">Wohn-/ und Geschäftshäuser</option>
			</select>

			<select id="unbebaut1" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="landwirtschaftlich">Landwirtschaftliche Grundstücke</option>
				<option value="forstwirtschaftlich">Forstwirtschaftliche Grundstücke</option>
			</select>
						
			<h5 style="padding-top:15px;">Bauweise (I):</h5>
			<select id="bauweise1" class="save">
				<option value="keine_angabe">Keine Angabe</option>
				<option value="offen">offen</option>
				<option value="geschlossen">geschlossen</option>
				<option value="teils">teils</option>
			</select>

			<h5  id="gebaeudeart2" style="padding-top:15px;">Gebäudeart (II):</h5>
			
			<select id="umgebungsbebauung2" class="save"></select>
			<br>

			<select id="wohnwirtschaftliche_nutzung2" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="villen">Villen</option>
				<option value="einfamilienhaeuser">Einfamilienhäuser</option>
				<option value="zweifamilienhaeuser">Zweifamilienhäuser</option>
				<option value="doppelhäuser">Doppelhäuser</option>
				<option value="mehrfamilienhaeuser">Mehrfamilienhäuser</option>
				<option value="reihenhaeuser">Reihenhäuser</option>
				<option value="wohnblocks">Wohnblocks</option>
			</select>

			<select id="gewerbliche_nutzung2" class="save" style="display:none">
			<option value="">Keine Angabe</option>
				<option value="buero_und_geschaeftshaeuser">Büro-/ und Geschäftshäuser</option>
				<option value="buerogebaeude">Bürogebäude</option>
				<option value="geschaeftshaeuser">Geschäftshäuser</option>
				<option value="gewerbe_und_industriegebaeude">Gewerbe-/ und Industriegebäude</option>
				<option value="landwirtschaftsgebaeude">Landwirtschaftsgebäude</option>
			</select>
		
			<select id="mischnutzung2" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="wohn_und_geschaeftshaeuser">Wohn-/ und Geschäftshäuser</option>
			</select>

			<select id="unbebaut2" class="save" style="display:none">
				<option value="">Keine Angabe</option>
				<option value="landwirtschaftlich">Landwirtschaftliche Grundstücke</option>
				<option value="forstwirtschaftlich">Forstwirtschaftliche Grundstücke</option>
			</select>
			



			<h5 style="padding-top:15px;">Bauweise (II):</h5>

			<select id="bauweise2" class="save">
				<option value="keine_angabe">Keine Angabe</option>
				<option value="offen">offen</option>
				<option value="geschlossen">geschlossen</option>
				<option value="teils">teils</option>
			</select>

			<br>	
			<select id="nutzungsverhaeltnis_slider" class="save" style="display:none">
				<option value="1">[Gebäudeart 1] 80% | 20% [Gebäudeart 2]</option>
				<option value="2">[Gebäudeart 1] 60% | 40% [Gebäudeart 2]</option>
				<option value="3" selected>[Gebäudeart 1] 50% | 50% [Gebäudeart 2]</option>
				<option value="4">[Gebäudeart 1] 40% | 60% [Gebäudeart 2]</option>
				<option value="5">[Gebäudeart 1] 20% | 80% [Gebäudeart 2]</option>
			</select>

		</div>

    </div>



<!--6. Parkplatzsituation-->  
<hr>     
<div id="parken">
        
	<h4>6. Parkplatzsituation:</h4>
	<select id="parkplatzsituation" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
		<option value="">Keine Angabe</option>
		<option value="entspannt">Entspannt</option>
		<option value="leicht_angespannt">Leicht angespannt</option>
		<option value="angespannt">Angespannt</option>
	</select>
	
	<div id="parkplatzsituation_begruendung" style="display:none">
		<p style="padding-top: 15px;">Begründung (Lage):</p>
		<select id="begruendung_lage" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
			<option value="">Keine Angabe</option>
			<option value="periphere_lage">Periphere Lage</option>
			<option value="laendliche_lage">Ländliche Lage</option>
			<option value="randlage">Stadt-/ Ortsrandlage</option>
			<option value="staedtische_lage">Städtische Lage</option>
			<option value="zentrale_lage">Zentrale Lage</option>
		</select>
		<br>
		
		<p style="padding-top: 15px;">Begründung (Straßenart):</p>
		<select id="begruendung_strasse" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
			<option value="">Keine Angabe</option>
			<option value="fussgaengerzone">Fußgängerzone</option>
			<option value="sackgasse">Sackgasse</option>
			<option value="spielstrasse">Spielstraße</option>
			<option value="anliegerstrasse">Anliegerstraße</option>
			<option value="durchgangsstrasse">Durchgangsstraße</option>
			<option value="hauptstrasse">Hauptstraße</option>
			<option value="hauptverkehrsader">Hauptverkehrsader</option>
		</select>
		<br>
		
		<p style="padding-top: 15px;">Zugehörige Stellplätze:</p>
		<select id="parkplatzsituation_vorhandene_stellplaetze" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
			<option value="">Keine Angabe</option>
			<option value="keine_vorhanden">Keine Stellplätze vorhanden</option>
			<option value="auswahl">Stellplätze wählen</option>
		</select>  
	</div>
	
	<div id="stellplaetze_auswahl" style="display:none">
		<input id="stellplaetze_aussen" class="save" placeholder="Anzahl an Außenstellplätzen">      
		<input id="stellplaetze_carport" class="save" placeholder="Anzahl an Carport-Stellplätzen">
		<input id="stellplaetze_garage" class="save" placeholder="Anzahl an Garagenstellplätzen">
		<input id="stellplaetze_tiefgarage" class="save" placeholder="Anzahl an Tiefgaragenstellplätzen">  
	</div>

</div>


<hr> 
<!--7. Naherholungsmöglichkeiten-->         
<div id="div_naherholungsmöglichkeit">

    <h4>7. Naherholungsmöglichkeiten:</h4>

	<select id="naherholungsmoeglichkeit_art1" class="save"></select>
	<input id="naherholungsmoeglichkeit_name1_1" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 1" style="display:none;">
	<input id="naherholungsmoeglichkeit_name1_2" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 2" style="display:none;">
	<input id="naherholungsmoeglichkeit_name1_3" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 3" style="display:none;">
	<br>
	<select id="naherholungsmoeglichkeit_art2" class="save" style="display:none;"></select>  
	<input id="naherholungsmoeglichkeit_name2_1" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 1" style="display:none;">
	<input id="naherholungsmoeglichkeit_name2_2" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 2" style="display:none;">
	<input id="naherholungsmoeglichkeit_name2_3" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 3" style="display:none;">
	<br>
	<select id="naherholungsmoeglichkeit_art3" class="save" style="display:none;"></select>  
	<input id="naherholungsmoeglichkeit_name3_1" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 1" style="display:none;">
	<input id="naherholungsmoeglichkeit_name3_2" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 2" style="display:none;">
	<input id="naherholungsmoeglichkeit_name3_3" class="save naherholungsmoeglichkeit_input" placeholder="Bezeichnung (Name) Nr. 3" style="display:none;">
        
</div>

 
<!--8. Ärztliche Primärversorgung-->        
<div id="div_aerztliche_primaerversorgung">
	<hr> 
   <div><h4>8. Ärztliche Primärversorgung:</h4></div>
                 
	<select id="aerztliche_primaerversorgung" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
		<option value="">Keine Angabe</option>
		<option value="gegeben">Vor Ort gegeben</option>
		<option value="nicht_gegeben">Vor Ort nicht gegeben</option>
	</select>
	
	<div id="div_aerztliche_primaerversorgung_koordinate" style="display:none">
		
		<p style="padding-top: 15px;">Versorgung gegeben in:</p>
		<input id="aerztliche_primaerversorgung_koordinate" class="save" placeholder="Koordinate der Gemeinde?*">
			
	</div>

</div>


<!--9. Aperiodischer Bedarf-->       
<div id="div_aperiodischer_bedarf">
	<hr> 
	<div><h4>9. Aperiodischer Bedarf:</h4></div>
	
	<select id="aperiodischer_bedarf" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
		<option value="">Keine Angabe</option>
		<option value="vollstaendig">Vollständige Deckung</option>
		<option value="weitestgehend">Weitestgehende Deckung</option>
		<option value="teilweise">Teilweise Deckung</option>
		<option value="unzureichend">Keine Deckung</option>
	</select>
	
	
	<div id="div_aperiodischer_bedarf_koordinate" style="display:none">
		
		<p style="padding-top: 15px;">Deckung verfügbar in:</p>
		<input id="aperiodischer_bedarf_koordinate" class="save" placeholder="Koordinate der Gemeinde?*">
				
	</div>

</div>

<!--Fazit-->   
<hr>     
<div id="fazit">
    
	<div id="div_wohnlage_karte">
		<h4>Capital Immobilien Kompass:</h4>

		<select id="wohnlage_karte" class="save">
			<option disabled selected value="">Bitte wählen..</option>
			<option value="">Keine Angabe</option>
			<option value="einfach">Einfache Wohnlage</option>
			<option value="mittel">Mittlere Wohnlage</option>
			<option value="gut">Gute Wohnlage</option>
			<option value="sehr_gut">Sehr gute Wohnlage</option>
			<option value="top">Top Wohnlage</option>
		</select>

		<div id="radio_wohnlage_anwender" style="display:none; margin-top:15px;">   
			<p>Entspricht gutachterlichem Eindruck vor Ort?</p>
			<input id="wohnlage_anwender_ja" type="radio" checked name="rad_gutachterliche_einschaetzung"/>
			<label for="wohnlage_anwender_ja"></span><span>Ja</span></label>
			<br>
			<input id="wohnlage_anwender_nein" type="radio" name="rad_gutachterliche_einschaetzung"/>
			<label for="wohnlage_anwender_nein"><span>Nein</span></label>
		</div>

		<div id="div_wohnlage_anwender" style="display:none;"> 
			<p style="margin-top:15px;">Abweichende gutachterliche Einschätzung:</p>
			<select id="wohnlage_anwender" class="save">
				<option value="einfach">Einfache Wohnlage</option>
				<option value="mittel">Mittlere Wohnlage</option>
				<option value="gut">Gute Wohnlage</option>
				<option value="sehr_gut">Sehr gute Wohnlage</option>
				<option value="top">Top Wohnlage</option>
			</select>
		</div>
	</div>
	
	<h4>Fazit zur Mikrolage:</h4></div>
	<select id="fazit_mikrolage" class="save" >
		<option disabled selected value="">Bitte wählen..</option>
		<option value="sehr_gut">Sehr gut</option>
		<option value="gut">Gut</option>
		<option value="mittel">Mittel</option>
		<option value="maessig">Mäßig</option>
		<option value="schlecht">Schlecht</option>
	</select>

	<h4>Fazit zur Verkehrsinfrastruktur:</h4></div>
	<select id="fazit_verkehrsanbindung" class="save" >
		<option disabled selected value="">Bitte wählen..</option>
		<option value="sehr_gut">Sehr gut</option>
		<option value="gut">Gut</option>
		<option value="mittel">Mittel</option>
		<option value="maessig">Mäßig</option>
		<option value="schlecht">Schlecht</option>
	</select>


</div>


<hr>     






	





	<br>
	<br>
	<button id="microlage_btn" onclick="microlage_search($('#micro_text'),$('#micro_link'))">Mikrolage abrufen</button>
	<br>
	<br>

	<h3 style="text-decoration: underline;">Api-Ausgabe:</h3> 
	<div>Api-Link:</div>
	<div id="micro_link"></div>
	<div>Textausgabe:</div>
	<div id="micro_text" style="width:800px; min-height:80px; border-color:#000; border-style:solid; border-width:1px, height:auto"></div>

	<br>

</div>
<hr>

</body>
</html>




