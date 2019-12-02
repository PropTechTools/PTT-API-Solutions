jQuery(document).ready(function(){

    //compare object_categories.xlsx to see what object categorie needs what userinput
    $('#objektkategorie').change(function() {
        if(this.value == "1"){
            $('#div_aperiodischer_bedarf').fadeIn();
            $('#div_aerztliche_primaerversorgung').fadeIn();
            $('#divnaherholungsmöglichkeit').fadeIn();
            $('#div_wohnlage_karte').fadeIn();
        } else if (this.value == "2"){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#divnaherholungsmöglichkeit').hide();
            $('#div_wohnlage_karte').hide();
        } else if (this.value == "3"){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#divnaherholungsmöglichkeit').hide();
            $('#div_wohnlage_karte').hide();
        } else if (this.value == "4"){
            $('#div_aperiodischer_bedarf').fadeIn();
            $('#div_aerztliche_primaerversorgung').fadeIn();
            $('#divnaherholungsmöglichkeit').fadeIn();
            $('#div_wohnlage_karte').fadeIn();
        } else if (this.value == "5"){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#divnaherholungsmöglichkeit').fadeIn();
            $('#div_wohnlage_karte').hide();
        } else if (this.value == "6"){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#divnaherholungsmöglichkeit').hide();
            $('#div_wohnlage_karte').hide();
        } else if (this.value == "7"){
            $('#div_aperiodischer_bedarf').hide();
            $('#div_aerztliche_primaerversorgung').hide();
            $('#divnaherholungsmöglichkeit').hide();
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
        this.value == "bundesstraße" || 
        this.value == "bahnhof" || 
        this.value == "sbahnhof" || 
        this.value == "ubahnhof" || 
        this.value == "flughafen" || 
        this.value == "flugplatz" || 
        this.value == "hafen" || 
        this.value == "gewerbegebiet" || 
        this.value == "industriegebiet" || 
        this.value == "hauptverkehrsader" || 
        this.value == "hauptstraße" || 
        this.value == "durchgangsstraße" ||
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
        this.value == "bundesstraße"|| 
        this.value == "hauptverkehrsader" || 
        this.value == "hauptstraße" || 
        this.value == "durchgangsstraße"|| 
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

        } else {

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
	
	$('#parkplatzsituation_vorhandene_stellplaetze').change(function()	{	
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

    else if	(dropdown_elm.val() == "bundesstraße")	{

        var placeholder = "Welche? (z.B. B11)"
    }

    else if	(dropdown_elm.val() == "hauptverkehrsader" || 
            dropdown_elm.val() == "hauptstraße" || 
            dropdown_elm.val() == "durchgangsstraße")	{

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


//dynamic dropdown (used for naherholung)
function dynamicDropdown(available_text_options_array,dropdown_field1,dropdown_field2,dropdown_field3,negative_option_field1)	{
	
    var selection_1 = new Object();
    var selection_2 = new Object();
    var selection_3 = new Object();
    var available_val_options_array = [];
    
    if	(negative_option_field1 !== "")	{

        $("<option/>").val("").text("Bitte wählen..").attr("selected",true).attr('disabled','disabled').prependTo('#'+dropdown_field1);
        $("<option/>").val("keine_verfuegbar").text("Keine verfügbar").appendTo('#'+dropdown_field1);

        for (var i=0;i<available_text_options_array.length;i++)	{
            var val = (available_text_options_array[i]).toLowerCase().replace("ü","ue").replace("ä","ae").replace("-/","_").replace(" ","_");
            $('<option/>').val(val).html(available_text_options_array[i]).appendTo('#'+dropdown_field1);
            available_val_options_array.push(val);
        }
    }
    else	{
    
        $("<option/>").val("").text("Bitte wählen..").attr("selected",true).attr('disabled','disabled').prependTo('#'+dropdown_field1);

        for (var i=0;i<available_text_options_array.length;i++)	{    
            var val = (available_text_options_array[i]).toLowerCase().replace("ü","ue").replace("ä","ae").replace("-/","_").replace(" ","_");
            $('<option/>').val(val).html(available_text_options_array[i]).appendTo('#'+dropdown_field1);
            available_val_options_array.push(val);
        } 
    }

	// Standardverfahren, wenn ein Feld verändert wird
	$('#'+dropdown_field1).change(function()	{
				 
		if	($('#'+dropdown_field1).val() == null || $('#'+dropdown_field1).val() == "keine_angabe"){
            selection_1.val= "keine_angabe";
            selection_2.val= "keine_angabe";
            selection_3.val= "keine_angabe";

            selection_1.text= "Keine Angabe";
            selection_2.text= "Keine Angabe";
            selection_3.text= "Keine Angabe";
        } 
		else	{
            selection_1.val= $('#'+dropdown_field1).val();
            selection_2.val= "keine_angabe";
            selection_3.val= "keine_angabe";

            selection_1.text= $('#'+dropdown_field1+" option:selected").text();
            selection_2.text= "Keine Angabe";
            selection_3.text= "Keine Angabe";
        }
				 
	});
	
	$('#'+dropdown_field2).change(function()	{
				 
		if	($('#'+dropdown_field2).val() == null || $('#'+dropdown_field2).val() == "Keine Angabe"){
            selection_1.val= $('#'+dropdown_field1).val();
            selection_2.val= "keine_angabe";
            selection_3.val= "keine_angabe";

            selection_1.text= $('#'+dropdown_field1+" option:selected").text();
            selection_2.text= "Keine Angabe";
            selection_3.text= "Keine Angabe";
        }
		else	{
            selection_1.val= $('#'+dropdown_field1).val();
            selection_2.val= $('#'+dropdown_field2).val();
            selection_3.val= "keine_angabe";

            selection_1.text= $('#'+dropdown_field1+" option:selected").text();
            selection_2.text= $('#'+dropdown_field2+" option:selected").text();
            selection_3.text= "Keine Angabe";
        }	 
	});
	
	$('#'+dropdown_field3).change(function()	{		 
		if	($('#'+dropdown_field3).val() == null || $('#'+dropdown_field3).val() == "keine_angabe"){
            selection_1.val= $('#'+dropdown_field1).val();
            selection_2.val= $('#'+dropdown_field2).val();
            selection_3.val= "keine_angabe";

            selection_1.text= $('#'+dropdown_field1+" option:selected").text();
            selection_2.text= $('#'+dropdown_field2+" option:selected").text();
            selection_3.text= "Keine Angabe"
        }		 
		else	{
            selection_1.val= $('#'+dropdown_field1).val();
            selection_2.val= $('#'+dropdown_field2).val();
            selection_3.val= $('#'+dropdown_field3).val();

            selection_1.text= $('#'+dropdown_field1+" option:selected").text();
            selection_2.text= $('#'+dropdown_field2+" option:selected").text();
            selection_3.text= $('#'+dropdown_field3+" option:selected").text();
        }		 
	});
				
	$('#'+dropdown_field1+', #'+dropdown_field2+', #'+dropdown_field3).change(function()	{
		
		dropdown_field_text_modified = jQuery.grep(available_text_options_array, function(value)	{
			return value != selection_1.text && value != selection_2.text && value != selection_3.text;
        });
        dropdown_field_val_modified = jQuery.grep(available_val_options_array, function(value)	{
			return value != selection_1.val && value != selection_2.val && value != selection_3.val;
        });
    		
		$('#'+dropdown_field1).empty();
		$('#'+dropdown_field2).empty();
		$('#'+dropdown_field3).empty();

		for (var i=0;i<dropdown_field_text_modified.length;i++)	{
			$('<option/>').val(dropdown_field_val_modified[i]).html(dropdown_field_text_modified[i]).appendTo('#'+dropdown_field1+', #'+dropdown_field2+', #'+dropdown_field3);
		}
        

		$("<option/>").val(selection_1.val).text(selection_1.text).attr("selected",true).prependTo('#'+dropdown_field1);
		$("<option/>").val(selection_2.val).text(selection_2.text).attr("selected",true).prependTo('#'+dropdown_field2);
		$("<option/>").val(selection_3.val).text(selection_3.text).attr("selected",true).prependTo('#'+dropdown_field3);
		
		dropdownSort(dropdown_field1);
		dropdownSort(dropdown_field2);
        dropdownSort(dropdown_field3);
        
        if		(negative_option_field1 !== "")	{
		    $("<option/>").val("keine_verfuegbar").text("Keine verfügbar").prependTo('#'+dropdown_field1);
        }

		if	(selection_1.val == "keine_angabe")	{	
			$('#'+dropdown_field1).val("keine_angabe");		
		}
		
		if	(selection_2.val == "keine_angabe")	{	
			$('#'+dropdown_field2).val("keine_angabe");		
		}
		
		if	(selection_3.val == "keine_angabe")	{		
			$('#'+dropdown_field3).val("keine_angabe");		
		}
		
	});
		
	$('#'+dropdown_field1).change(function()	{
		if	($('#'+dropdown_field1).val() == "keine_angabe" || $('#'+dropdown_field1).val() == "keine_verfuegbar")	{
			$('#'+dropdown_field2).hide();
			$('#'+dropdown_field2).hide();
			$('#'+dropdown_field2).val("keine_angabe");
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).val("keine_angabe");
		}
		else    {
			$('#'+dropdown_field2).fadeIn();
			$('#'+dropdown_field2).show();
			$('#'+dropdown_field2).val("keine_angabe");
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).val("keine_angabe");
		}
	});
	
	$('#'+dropdown_field2).change(function()	{
		if	($('#'+dropdown_field2).val() == "keine_angabe")	{
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).hide();
			$('#'+dropdown_field3).val("keine_angabe");
		}
		else	{
			$('#'+dropdown_field3).fadeIn();
			$('#'+dropdown_field3).show();
			$('#'+dropdown_field3).val("keine_angabe");
		}
	});
			
}


//used by dynamic dropdown 
function dropdownSort(dropdown_id)	{
	
	var sel = $('#'+dropdown_id);
	var selected = sel.val();
	var opts_list = sel.find('option');
	opts_list.sort(function(a, b) { return $(a).text() > $(b).text() ? 1 : -1; }); // Array alphabetisch sortieren
	sel.html('').append(opts_list);
	sel.val(selected);
	$('#'+dropdown_id+" option[value='keine_angabe']").remove();
	$("<option/>").val("keine_angabe").text("Keine Angabe").prependTo('#'+dropdown_id);
	
}

