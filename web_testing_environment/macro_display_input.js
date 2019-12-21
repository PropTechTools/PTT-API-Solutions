
jQuery(document).ready(function(){
        
    // Wirtschaftsstruktur - Datenbankabfrage
    var wirtschaftsstruktur = [
        "Keine Angabe",								// 0
        "Agrarwirtschaft",							// 1
        "Automobilindustrie",						// 2
        "Bahnindustrie",							// 3
        "Bauwirtschaft",							// 4
        "Bergbau & Rohstoffe",						// 5
        "Bio- und Gentechnologie",					// 6
        "Chemie & Pharmazie",						// 7
        "Dienstleistung & Handwerk",				// 8
        "Digitalwirtschaft",						// 9
        "Elektrotechnik & Elektronikindustrie",		// 10
        "Energie & Umwelt",							// 11
        "Ernährungsindustrie",						// 12
        "Feinkeramische Industrie",					// 13
        "Feinmechanik & Optik",						// 14
        "Finanzwirtschaft",							// 15
        "Forschung & Entwicklung",					// 16
        "Genussmittelindustrie",					// 17
        "Gesundheitswirtschaft",					// 18
        "Glasindustrie",							// 19
        "Handelsindustrie",							// 20
        "High-Tech & Innovation",					// 21
        "Holz- und Möbelindustrie",					// 22
        "Informationstechnik & Kommunikation",		// 23
        "Kautschukindustrie",						// 24
        "Kosmetikindustrie",						// 25
        "Kredit- und Versicherungsgewerbe",			// 26
        "Kultur- und Kreativwirtschaft",			// 27
        "Kunst- und Klebstoffindustrie",			// 28
        "Kunststoffindustrie",						// 29
        "Leder-(waren)industrie",					// 30
        "Luft- und Raumfahrt",						// 31
        "Maritime Wirtschaft",						// 32
        "Maschinen- und Anlagenbau",				// 33
        "Medien & Marketing",						// 34
        "Metallindustrie",							// 35
        "Papier- und Druckindustrie",				// 36
        "Pflegewirtschaft",							// 37
        "Post- und Kuriergewerbe",					// 38
        "Rüstungsindustrie",						// 39
        "Schließsysteme & Sicherheitstechnik",		// 40
        "Schmuckindustrie",							// 41
        "Schuhindustrie",							// 42
        "Spielwarenindustrie",						// 43
        "Sportwirtschaft",							// 44
        "Textilindustrie",							// 45
        "Tourismus & Gastronomie",					// 46
        "Verkehr & Logistik",						// 47
        "Verpackungsindustrie",						// 48
        "Werkstoffindustrie",						// 49
        "Wirtschaft & Politik"						// 50
    ];

    dynamicDropdown(wirtschaftsstruktur,"wirtschaftsstruktur1","wirtschaftsstruktur2","wirtschaftsstruktur3","");
    
    $( "#macro_textlength" ).change(function() {
        if (this.value == "short"){
            $("#wirtschaftsstruktur_div").hide();
        } else {
            $("#wirtschaftsstruktur_div").show();
        }
    });
});