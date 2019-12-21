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
            var val = (available_text_options_array[i]).toLowerCase().replace("ü","ue").replace("ö","oe").replace("ä","ae").replace(" & ","_und_").replace("-/","_").replace("- ","_").replace("-","_").replace("(","").replace(")","").replace(" ","_");
            $('<option/>').val(val).html(available_text_options_array[i]).appendTo('#'+dropdown_field1);
            available_val_options_array.push(val);
        }
    }
    else	{
    
        $("<option/>").val("").text("Bitte wählen..").attr("selected",true).attr('disabled','disabled').prependTo('#'+dropdown_field1);

        for (var i=0;i<available_text_options_array.length;i++)	{    
            var val = (available_text_options_array[i]).toLowerCase().replace("ü","ue").replace("ö","oe").replace("ä","ae").replace(" & ","_und_").replace("-/","_").replace("- ","_").replace("-","_").replace("(","").replace(")","").replace(" ","_");
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