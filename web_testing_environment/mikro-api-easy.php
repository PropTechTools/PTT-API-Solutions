<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="dynamic_dropdown.js"></script>
<script src="micro_display_input.js"></script>

<?php
header("Access-Control-Allow-Origin: *");
?>

</head>
<script>
//Saving Apidata to object
function collectData(){
    //Init Params
    api_req = {
        latlng:"50.771279,6.085676",
    };
    $('.save').each(function(){
        if(this.value != ""){
            if (this.type == "checkbox"){
                api_req[this.id] = this.checked;
            } else {
                api_req[this.id] = $('#'+this.id).val();
            }    
        }
    });
    console.log(api_req)
};


//visualising of processingtime between request and response (processingtime around 10 sec)
function countDown(htlm_elem){
    var counter = 10;
    
    var interval = setInterval(function() {
        counter--;
        if(counter < 0) {
            htlm_elem.text("SUCCESS")
            clearInterval(interval);
        } else {
            htlm_elem.text("Text wird in "+counter.toString()+" sek angezeigt")
        }
        
    }, 1000);
}


function microlage_search(div, url) {
    collectData();

    //Credentials
	var system = "dte";
    var apiKey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
	var name = "sYp4kEAtyUnH67K1";
	var requester = "test@proptechtools.de"
    
  
    URL_PARAM = "";
    for (let [key, value] of Object.entries(api_req)) {
        URL_PARAM += key+"="+value+"&"
    }
    
    URL = "https://www.proptechapi.de/"+system+"/microlage/json?"+
    "apiKey="+apiKey+
    "&name="+name+
    "&requester="+requester+
    "&"+URL_PARAM
   
    console.log(URL)

    url.html("<a href="+URL+" target='_blank'>"+URL+"</a>");
    
    countDown($('#microlage_btn'))
    $.getJSON(URL, function(data) {
        console.log(data.message)
        if (data.success == true){
            div.html(data.data.html_text);
            console.log(data.data.html_text);
        } else {
            div.html(data.message);
            console.log(data)
        }
    })

}
</script>


<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right;"></a>
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
<a style="font-style:italic">Bei Verwendung der eigenen Anmeldedaten muss "dte" in der URL entfernt werden: www.proptechapi.de/dte/microlage/json... => www.proptechapi.de/microlage/json...</a>

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

<h2 >Mikrolage-API (Easy-Integration)</h2>
<li>Requesttime around <b>6 sec</b></li>
<li>User enters all userdata, all userdata is collected and requested in <b>one request</b> when pressing the button `Mikrolage abrufen`</li>
<li><a href="https://github.com/PropTechTools/PTT-API-Solutions/blob/master/ptt-mikro-api.md" target="_blank" style="color:#ff9800">Integrationsanleitung</a></li>
<br>
	
<hr>	
	<h4>Obligatorischer Parameter:</h4>
	<div>Bewertungsobjekt-Koordinaten* (50.771279,6.085676)</div>
	<input id="latlng" class="save" placeholder="Bewertungsobjekt-Koordinaten">
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
	<br>
	<a href="https://github.com/PropTechTools/PTT-API-Solutions/blob/master/ptt-mikro-api.md#overview" target="_blank" style="color:#ff9800">Welche Textausgabe gibt es in den jeweiligen Objektkategorie?</a>
</div>

<!--MICROLAGE BEARBEITUNG-->  
<hr>          
<div id="Bearbeitung_micro">
	<br>
	<div>Stadtzentrum-Koordinaten (50.775396,6.086234)</div>
	<input id="stadtzentrum" class="save" placeholder="latlng">

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
		<select id="stellplaetze" class="save"><!--style="width: 45%;height:20px;padding: 16px 20px;border: none;background-color: #f1f1f1;"-->
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
		<h4>10. Wohnlagenkarte:</h4>

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




