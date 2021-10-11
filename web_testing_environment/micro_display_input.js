jQuery(document).ready(function(){

    //compare object_categories.xlsx to see what object categorie needs what userinput
    $('#objektkategorie').change(function() {
        console.log(this.value)
        if (this.value == 'betreutes_wohnen' ||
            this.value == 'doppelhaushaelfte' ||
            this.value == 'eigentumswohnung' ||
            this.value == 'einfamilienhaus' ||
            this.value == 'einfamilienhaus_mit_einliegerwohnung' ||
            this.value == 'einfamilienhaus_mit_gewerbe' ||
            this.value == 'fluechtlingsheim' ||
            this.value == 'mehrfamilienhaus' ||
            this.value == 'mikroappartment' ||
            this.value == 'pflegeheim' ||
            this.value == 'plattenbau' ||
            this.value == 'rehaklinik_kurklinik' ||
            this.value == 'reihenendhaus' ||
            this.value == 'reihenmittelhaus' ||
            this.value == 'studentenwohnheim' ||
            this.value == 'wohn_und_geschaeftshaus' ||
            this.value == 'wohnanlage' ||
            this.value == 'wohnheim' ||
            this.value == 'zweifamilienhaus'
        ){
            $('#div_aperiodischer_bedarf').fadeIn();
            $('#div_aerztliche_primaerversorgung').fadeIn();
            $('#div_naherholungsmöglichkeit').fadeIn();
            $('#div_wohnlage_karte').fadeIn();
        } 
        else if ( 
            this.value == 'appartmenthaus_boardinghaus' ||
            this.value == 'ferienwohnung_wochenendhaus' ||
            this.value == 'gastronomiebetrieb' ||
            this.value == 'hotel' ||
            this.value == 'pension'
        ){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#div_naherholungsmöglichkeit').fadeIn();
            $('#div_wohnlage_karte').hide();
        } 
        else {
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#div_naherholungsmöglichkeit').hide();
            $('#div_wohnlage_karte').hide();
        }
    });


    //1. Innerörtliche Lage
    $('#inneroertliche_lage').change(function() {
        if  (this.value == 'zentrum'){
            $('#div_fussgaengerzone').fadeIn()
            $('#div_separiert').hide()
            $('#div_randlage').hide()
        } 
        else {
            $('#div_fussgaengerzone').hide()
            $('#div_separiert').fadeIn()
            $('#div_randlage').fadeIn()
        }
    });


    //2. Art der baulichen Nutzung
    $('#flaechennutzung').change(function() {
        if  (this.value == 'industriegebiet'){
            $('#gewerbegebiet_name').hide();
            $('#industriegebiet_name').fadeIn();
        } 
        else if(this.value == 'gewerbegebiet'){
            $('#industriegebiet_name').hide();
            $('#gewerbegebiet_name').fadeIn();
        } 
        else {
            $('#gewerbegebiet_name').hide();
            $('#industriegebiet_name').hide();
        }
    });


    //3. Geografische Besonderheit
    $('#geografische_besonderheit').change(function() {
        
        if  (this.value == "autobahn" || 
        this.value == "bundesstrasse" || 
        this.value == "bahnhof" || 
        this.value == "sbahnhof" || 
        this.value == "ubahnhof" || 
        this.value == "flughafen" || 
        this.value == "flugplatz" || 
        this.value == "hafen" || 
        this.value == "gewerbegebiet" || 
        this.value == "industriegebiet" || 
        this.value == "hauptverkehrsader" || 
        this.value == "hauptstrasse" || 
        this.value == "durchgangsstrasse" ||
        this.value == "kirche" ||
        this.value == "platz" ||
        this.value == "sport_freizeitanlage" ||
        this.value == "parkanlage" ||
        this.value == "naturschutzgebiet" ||
        this.value == "erholungsgebiet" ||
        this.value == "wald" ||
        this.value == "gebirge")	{
            $('#geografische_besonderheiten_praezisierung_gewaesser').hide();
            $('#geografische_besonderheiten_praezisierung').fadeIn();
        }
        else if	(this.value == "gewaesser")	{
            $('#geografische_besonderheiten_praezisierung_gewaesser').fadeIn();
            $('#geografische_besonderheiten_praezisierung').fadeIn();
        }
        else	{
            $('#geografische_besonderheiten_praezisierung_gewaesser').hide();
            $('#geografische_besonderheiten_praezisierung').hide();
        }

        adjPlaceholder($('#geografische_besonderheit'), $('#geografische_besonderheiten_praezisierung'))
    });


    //4. Lärmbelastung
    $('#laermbelastung').change(function() {  
        if		(this.value !== "")	{       
            $('#div_laermbelastung_grund').fadeIn();
        }
        else	{ 
            document.getElementById("laermbelastung_grund").selectedIndex = 0
            $('#div_laermbelastung_grund').hide();
            $('#laermbelastung_grund_praezisierung').hide();     
        }
    });

    $('#laermbelastung').change(function() {
        if  (this.value == "autobahn"|| 
        this.value == "bundesstrasse"|| 
        this.value == "hauptverkehrsader" || 
        this.value == "hauptstrasse" || 
        this.value == "durchgangsstrasse"|| 
        this.value == "bahnhof" || 
        this.value == "sbahnhof" || 
        this.value == "ubahnhof"|| 
        this.value == "flughafen"|| 
        this.value == "flugplatz"|| 
        this.value == "hafen"|| 
        this.value == "gewerbegebiet"|| 
        this.value == "industriegebiet")	{
            $('#laermbelastung_grund_praezisierung').fadeIn();
            adjPlaceholder($('#laermbelastung_grund'), $('#laermbelastung_grund_praezisierung'))
        } 
        else {
            $('#laermbelastung_grund_praezisierung').hide();
        };
    });


    //5. Umgebungsbebauung
    var umgebungsbebauung = [
        "Keine Angabe",
		"Wohnwirtschaftliche Nutzung",
		"Gewerbliche Nutzung",
        "Mischnutzung",
        "Unbebaute Grundstücke"
    ]
    dynamicDropdown(umgebungsbebauung,"umgebungsbebauung1","umgebungsbebauung2","leer","");

    $('#umgebungsbebauung1').change(function() {
        if (this.value == "keine_angabe"){
            $('#div_umgebungsbebauung, #wohnwirtschaftliche_nutzung1, #gewerbliche_nutzung1, #mischnutzung1, #unbebaut1').hide();
        } 
        else {
            $('#div_umgebungsbebauung').fadeIn();

            $('#wohnwirtschaftliche_nutzung2, #gewerbliche_nutzung2, #mischnutzung2, #unbebaut2').hide();
            if (this.value == "wohnwirtschaftliche_nutzung"){
                $('#wohnwirtschaftliche_nutzung1, #gewerbliche_nutzung1, #mischnutzung1, #unbebaut1').hide();
                $('#wohnwirtschaftliche_nutzung1').fadeIn();
            }
            else if (this.value == "gewerbliche_nutzung"){
                $('#wohnwirtschaftliche_nutzung1, #gewerbliche_nutzung1, #mischnutzung1, #unbebaut1').hide();
                $('#gewerbliche_nutzung1').fadeIn();
            }
            else if (this.value == "mischnutzung"){
                $('#wohnwirtschaftliche_nutzung1, #gewerbliche_nutzung1, #mischnutzung1, #unbebaut1').hide();
                $('#mischnutzung1').fadeIn();
            }
            else if (this.value == "unbebaute_grundstuecke"){
                $('#wohnwirtschaftliche_nutzung1, #gewerbliche_nutzung1, #mischnutzung1, #unbebaut1').hide();
                $('#unbebaut1').fadeIn();
            } 
        };
    });

    $('#umgebungsbebauung2').change(function() {
        if (this.value !== "keine_angabe"){
            $('#nutzungsverhaeltnis_slider').fadeIn();
        }
        else {
            $('#nutzungsverhaeltnis_slider').hide();
        }

        if (this.value == "wohnwirtschaftliche_nutzung"){
            $('#wohnwirtschaftliche_nutzung2, #gewerbliche_nutzung2, #mischnutzung2, #unbebaut2').hide();
            $('#wohnwirtschaftliche_nutzung2').fadeIn();
        }
        else if (this.value == "gewerbliche_nutzung"){
            $('#wohnwirtschaftliche_nutzung2, #gewerbliche_nutzung2, #mischnutzung2, #unbebaut2').hide();
            $('#gewerbliche_nutzung2').fadeIn();
        }
        else if (this.value == "mischnutzung"){
            $('#wohnwirtschaftliche_nutzung2, #gewerbliche_nutzung2, #mischnutzung2, #unbebaut2').hide();
            $('#mischnutzung2').fadeIn();
        }
        else if (this.value == "unbebaute_grundstuecke"){
            $('#wohnwirtschaftliche_nutzung2, #gewerbliche_nutzung2, #mischnutzung2, #unbebaut2').hide();
            $('#unbebaut2').fadeIn();
        }
    });


    //6. Parkplatzsituation
	$('#parkplatzsituation').change(function()	{
		if		(this.value == "")	{
            $('#parkplatzsituation_begruendung').hide(); 
		}
		else	{	
            $('#parkplatzsituation_begruendung').fadeIn();	
		}
	});
	
	$('#stellplaetze').change(function()	{	
		if	(this.value == "" || this.value == "keine_vorhanden")	{		
            $('#stellplaetze_auswahl').hide();		
		}
		else	{		
            $('#stellplaetze_auswahl').fadeIn();		
		}	
	});


    //7. Naherholungsmöglichkeiten
   // DYNAMISCHES DROPDOWN - NAHERHOLUNG	
	var startkonfiguration_naherholung = [
        "Keine Angabe",								
        "Grünflächen",							
        "Sport-/Freizeitanlage",						
        "Naturschutzgebiet",							
        "Erholungsgebiet",							
        "Parkanlage",						
        "Gewässer",					
        "Wald",						
        "Gebirge"			 
    ];

    dynamicDropdown(startkonfiguration_naherholung,"naherholungsmoeglichkeit_art1","naherholungsmoeglichkeit_art2","naherholungsmoeglichkeit_art3","Negativoption");

	$('#naherholungsmoeglichkeit_art1').change(function()	{	
		if  (this.value == "gruenflaechen" || this.value == "keine_verfuegbar" || this.value == "keine_angabe" )	{
            $('#naherholungsmoeglichkeit_name1_1').hide().val("");
            $('#naherholungsmoeglichkeit_name1_2').hide().val("");
            $('#naherholungsmoeglichkeit_name1_3').hide().val("");
            
            $('#naherholungsmoeglichkeit_name2_1').hide().val("");
            $('#naherholungsmoeglichkeit_name2_2').hide().val("");
            $('#naherholungsmoeglichkeit_name2_3').hide().val("");
            
            $('#naherholungsmoeglichkeit_name3_1').hide().val("");
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");	
		}	
		else	{
            $('#naherholungsmoeglichkeit_name1_1').fadeIn().val("");
            $('#naherholungsmoeglichkeit_name1_2').hide().val("");
            $('#naherholungsmoeglichkeit_name1_3').hide().val("");
            
            $('#naherholungsmoeglichkeit_name2_1').hide().val("");
            $('#naherholungsmoeglichkeit_name2_2').hide().val("");
            $('#naherholungsmoeglichkeit_name2_3').hide().val("");
            
            $('#naherholungsmoeglichkeit_name3_1').hide().val("");
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");		
		}
	});
	
	$('#naherholungsmoeglichkeit_art2').change(function()	{
        if	(this.value == "gruenflaechen" || this.value == "keine_angabe" )	{
            $('#naherholungsmoeglichkeit_name2_1').hide().val("");
            $('#naherholungsmoeglichkeit_name2_2').hide().val("");
            $('#naherholungsmoeglichkeit_name2_3').hide().val("");
            
            $('#naherholungsmoeglichkeit_name3_1').hide().val("");
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");		
		}				
		else	{	
            $('#naherholungsmoeglichkeit_name2_1').fadeIn().val("");
            $('#naherholungsmoeglichkeit_name2_2').hide().val("");
            $('#naherholungsmoeglichkeit_name2_3').hide().val("");

            $('#naherholungsmoeglichkeit_name3_1').hide().val("");
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");		
		}			
	});
	
	$('#naherholungsmoeglichkeit_art3').change(function()	{
		if	(this.value == "gruenflaechen" || this.value == "keine_angabe")	{
            $('#naherholungsmoeglichkeit_name3_1').hide().val("");
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");   			
		}
		else	{	
			$('#naherholungsmoeglichkeit_name3_1').fadeIn();
		}
	});
    
    
	// START - Dynamisches Ausblenden der Eingabefelder
	// Art 1
	$('#naherholungsmoeglichkeit_name1_1').keypress(function()	{
		$('#naherholungsmoeglichkeit_name1_2').fadeIn();
	});
		
	$('#naherholungsmoeglichkeit_name1_1').change(function(){		
		if	(this.value == "")	{	
			$('#naherholungsmoeglichkeit_name1_2').hide().val("");
			$('#naherholungsmoeglichkeit_name1_3').hide().val("");					
		}		
	});
		
	$('#naherholungsmoeglichkeit_name1_2').keypress(function()	{
		$('#naherholungsmoeglichkeit_name1_3').fadeIn();	
	});
	
	$('#naherholungsmoeglichkeit_name1_2').change(function()	{	
		if	(this.value == "")	{
			$('#naherholungsmoeglichkeit_name1_3').hide().val("");		
		}	
	});
    
    
    // Art 2
	$('#naherholungsmoeglichkeit_name2_1').keypress(function()	{
        $('#naherholungsmoeglichkeit_name2_2').fadeIn(300);	
	});
		
	$('#naherholungsmoeglichkeit_name2_1').change(function()	{			
		if	(this.value == "")	{		
			$('#naherholungsmoeglichkeit_name2_2').hide().val("");
			$('#naherholungsmoeglichkeit_name2_3').hide().val("");						
		}		
	});
	
	$('#naherholungsmoeglichkeit_name2_2').keypress(function()	{	
		$('#naherholungsmoeglichkeit_name2_3').fadeIn();	
	});
	
	$('#naherholungsmoeglichkeit_name2_2').change(function()	{	
		if	(this.value == "")	{
			$('#naherholungsmoeglichkeit_name2_3').hide().val("");	
		}	
	});
    
    
	// Art 3
	$('#naherholungsmoeglichkeit_name3_1').keypress(function()	{
		$('#naherholungsmoeglichkeit_name3_2').fadeIn();	
	});
		
	$('#naherholungsmoeglichkeit_name3_1').change(function()	{	
		if	(this.value == "")	{
            $('#naherholungsmoeglichkeit_name3_2').hide().val("");
            $('#naherholungsmoeglichkeit_name3_3').hide().val("");		
		}	
	});
	
	$('#naherholungsmoeglichkeit_name3_2').keypress(function()	{
		$('#naherholungsmoeglichkeit_name3_3').fadeIn();
	});
	
	$('#naherholungsmoeglichkeit_name3_2').change(function()	{
		if	(this.value == "")	{
			$('#naherholungsmoeglichkeit_name3_3').hide().val("");		
		}	
	});

    $('.naherholungsmoeglichkeit_input').change(function() {
        if  (this.value == "Ostsee" || this.value == "Nordsee"){
            alert("Bitte keine Meere eintragen, da diese automatisch referenziert werden!")
        }
    });


    //8. Ärztliche Primärversorgung
    $('#aerztliche_primaerversorgung').change(function() {
        if	(this.value == "nicht_gegeben")	{
            $('#div_aerztliche_primaerversorgung_koordinate').fadeIn();
        } 
        else {
            $('#div_aerztliche_primaerversorgung_koordinate').hide(); 
        }
    });


    //9. Aperiodischer Bedarf
    $('#aperiodischer_bedarf').change(function() {
        if	(this.value == "weitestgehend" || this.value == "teilweise" || this.value == "unzureichend")	{
            $('#div_aperiodischer_bedarf_koordinate').fadeIn();
        } 
        else {
            $('#div_aperiodischer_bedarf_koordinate').hide(); 
        }
    });


    //Fazit
    $('#wohnlage_karte').change(function() {
        $('#wohnlage_anwender').val(this.value);

        if	(this.value !== "")	{
            $('#radio_wohnlage_anwender').fadeIn();    
        } 
        else {
            $('#radio_wohnlage_anwender').hide();
            $('#div_wohnlage_anwender').hide();
            $('#wohnlage_anwender_ja').prop('checked',true);
        }
    });

    $('#wohnlage_anwender_ja').click(function() {
        if  (this.checked == true){
            $('#div_wohnlage_anwender').hide();
        }
    });

    $('#wohnlage_anwender_nein').click(function() {  
        if  (this.checked == true){
            $('#div_wohnlage_anwender').fadeIn();  
        }
    });
});


//placeholderadjustment
function adjPlaceholder(dropdown_elm, placeholder_of_input_praezisierung){ 
    if		(dropdown_elm.val() == "autobahn")	{
        var placeholder = "Welche? (z.B. A8)"
    }
    else if	(dropdown_elm.val() == "bundesstrasse")	{
        var placeholder = "Welche? (z.B. B11)"
    }
    else if	(dropdown_elm.val() == "hauptverkehrsader" || 
            dropdown_elm.val() == "hauptstrasse" || 
            dropdown_elm.val() == "durchgangsstrasse")	{
        var placeholder = "Name der Straße?"
    }
    else if	(dropdown_elm.val() == "bahnhof" || 
            dropdown_elm.val() == "sbahnhof" || 
            dropdown_elm.val() == "ubahnhof")	{
        var placeholder = "Name des Bahnhofs?"
    }
    else if	(dropdown_elm.val() == "flughafen")	{
        var placeholder = "Name des Flughafens?"
    }
    else if	(dropdown_elm.val() == "flugplatz")	{
        var placeholder = "Name des Flugplatzes?"
    }
    else if	(dropdown_elm.val() == "hafen")	{
        var placeholder = "Name des Hafens?"
    }
    else if	(dropdown_elm.val() == "gewerbegebiet")	{
        var placeholder = "Name des Gewerbegebiets?"
    }
    else if	(dropdown_elm.val() == "industriegebiet")	{
        var placeholder = "Name des Industriegebiets?"
    }
    else if	(dropdown_elm.val() == "kirche")	{
        var placeholder = "Name der Kirche?"
    }
    else if	(dropdown_elm.val() == "platz")	{
        var placeholder = "Name des Platzes?"
    }
    else if	(dropdown_elm.val() == "sport_freizeitanlage" || 
            dropdown_elm.val() == "parkanlage")	{
        var placeholder = "Name der Anlage?"
    }
    else if	(dropdown_elm.val() == "naturschutzgebiet" || 
            dropdown_elm.val() == "erholungsgebiet")	{
        var placeholder = "Name des Gebiets?"
    }
    else if	(dropdown_elm.val() == "wald")	{
        var placeholder = "Name des Walds?"
    }
    else if	(dropdown_elm.val() == "gebirge")	{
        var placeholder = "Name des Gebirges?";
    }
    else if	(dropdown_elm.val() == "gewaesser")	{
        var placeholder = "Name des Gewässers?";
    }
    
    placeholder_of_input_praezisierung.attr("placeholder", placeholder).val("").focus().blur();
}


