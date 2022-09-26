[<- back to overview](README.md)
***

## II) PTT-Mikro-API
The "mikrolage" module enables the processing request of a meaningful micro location description including various individual address relevant key figures for any desired address in Germany.

***
### General Information:

* The file `display_input.js` is included to manage the display of userinputfields.
<br>=> The user will only be able to input the minimum amout of necessary data dependent of the chosen `objektkategorie` ([Overview](#overview)).
* There are two ways to integrate the Mikro-API, [a) Easy Integration](#easy) and [b) Advanced Integration](#adv).

### <a name="easy"></a>a) Easy Integration:

* Requesttime around **6 sec**
* User enters all userdata, all userdata is collected and sent in **one request at the end** of the process.
* [Example](https://api.proptechtools.de/mikro-api-easy.php)


### <a name="adv"></a>b) Advanced Integration:

* Requesttime is reduced to **1,2 sec**
<br>=> Increases usabilty and leads to a more responsive userinterface.


* Time saving is accomplished by splitting **one request at the end** into **two requests**:
  - request at the beginning:
    * specified by the parameter `auto_analysis = true` 
    * reduced to parameter `objektkategorie` and `latlng` of bewertungsobjekt.
    * still takes 6 sec to load but is loaded in the background while user is inputting additional userdata
  - request at the end:
    * including all userdata in the query
    * takes 1,2 sec to load and only processeses userdata

* The results of both requests are merged and form a hybridtext. 
* Updating the userdata and requesting an updated form of the text triggers only the seccond request (request at the end [1,2 sec]).

***
### Optional text settings parameters:

#### 1. Innerörtliche Lage:
Innerörtliche-Lage-options can always be used independent of the chosen `objektkategorie`:
| Property                         | Input-Type  | Mandatory? | Default     | Possible Values                                              |
|:-------------------------------- |:----------- |:---------- |:----------- |:------------------------------------------------------------ |
| stadtzentrum                     | coordinates | optional   | autoanalyse | Overwrites autoanalyse if set. Format: `XX.XXXXXX,XX.XXXXXX` |
| inneroertliche_lage              | dropdown    | optional   | `teil`      | `zentrum`,`teil`,`aussenbereich`                             |
| stadtteilzentrum_naehe           | checkbox    | optional   | `false`     | `true`,`false`                                               |
| stadtteilzentrum_konkretisierung | textfield   | optional   |             |                                                              |
| fussgaengerzone                  | checkbox    | optional   | `false`     | `true`,`false`                                               |
| separiert                        | checkbox    | optional   | `false`     | `true`,`false`                                               |
| randlage                         | checkbox    | optional   | `false`     | `true`,`false`                                               |

#### 2. Art der baulichen Nutzung:
Bauliche-Nutzung-options can always be used independent of the chosen `objektkategorie`:
| Property             | Input-Type | Mandatory? | Default | Possible Values                                                                                                                                                                                              |
|:-------------------- |:---------- |:---------- |:------- |:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| flaechennutzung      | Dropdown   | optional   | `""`    | `""`,`allgemeines_wohngebiet`,`besonderes_wohngebiet`,`reines_wohngebiet`,`dorfgebiet`,`kerngebiet`,`kleinsiedlungsgebiet`,`gewerbegebiet`,`mischgebiet`,`industriegebiet`,`sondergebiet`,`sanierungsgebiet` |
| gewerbegebiet_name   | Textfield  | optional   |         |                                                                                                                                                                                                              |
| industriegebiet_name | Textfield  | optional   |         |                                                                                                                                                                                                              |
#### 3. Geographische Besonderheit:
Geographische-Besonderheit-options can always be used independent of the chosen `objektkategorie`:
| Property                                            | Input-Type | Mandatory? | Default | Possible Values                                                                                                                                                                                                                                                                                                                                                              |
|:--------------------------------------------------- |:---------- |:---------- |:------- |:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| geografische_besonderheit                           | dropdown   | optional   | `""`    | `""`,`autobahn`,`bundesstrasse`,`hauptverkehrsader`,`durchgangsstrasse`,`bahntrasse`,`bahnhof`,`sbahnhof`,`ubahnhof`,`flughafen`,`flugplatz`,`hafen`,`fussgaengerzone`,`platz`,`rathaus`,`krankenhaus`,`schule`,`kirche`,`friedhof`,`gewerbegebiet`,`industriegebiet`,`sport_freizeitanlage`,`naturschutzgebiet`,`erholungsgebiet`,`parkanlage`,`gewaesser`,`wald`,`gebirge` |
| geografische_besonderheiten_praezisierung_gewaesser | dropdown   | optional   | `""`    | `bach`,`fluss`,`kanal`,`see`                                                                                                                                                                                                                                                                                                                                                 |
| geografische_besonderheiten_praezisierung           | textfield  | optional   |         |                                                                                                                                                                                                                                                                                                                                                                              |

#### 4. Lärmbelastung:
Lärmbelastung-options can always be used independent of the chosen `objektkategorie`:
| Property                           | Input-Type | Mandatory? | Default | Possible Values                                                                                                                                                                                                                           | 
|:---------------------------------- |:---------- |:---------- |:------- |:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| laermbelastung                     | dropdown   | optional   | `""`    | `""`,`gering`,`mittel`,`hoch`                                                                                                                                                                                                             |
| laermbelastung_grund               | dropdown   | optional   | `""`    | `""`,`autobahn`,`bundesstrasse`,`hauptverkehrsader`,`durchgangsstrasse`,`bahntrasse`,`bahnhof`,`s-bahnhof`,`u-bahnhof`,`flughafen`,`flugplatz`,`hafen`,`krankenhaus`,`schule`,`kirche`,`gewerbegebiet`,`industriegebiet`,`innenstadtlage` |
| laermbelastung_grund_praezisierung | textfield  | optional   |         |                                                                                                                                                                                                                                           |


#### 5. Umgebungsbebauung:
Umgebungsbebauung-options can always be used independent of the chosen `objektkategorie`:
| Property                     | Input-Type | Mandatory?                                                                                                                     | Default                                                                                                     | Possible Values                                                                                                                                                               |
|:---------------------------- |:---------- |:------------------------------------------------------------------------------------------------------------------------------ |:----------------------------------------------------------------------------------------------------------- |:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| umgebungsbebauung1           | dropdown   | optional                                                                                                                       | `keine_angabe`                                                                                              | `keine_angabe`,`wohnwirtschaftliche_nutzung`,`gewerbliche_nutzung`,`mischnutzung`,`unbebaut`                                                                                  |
| wohnwirtschaftliche_nutzung1 | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"` **AND** `umgebungsbebauung1`=`wohnwirtschaftliche_nutzung` | `""`                                                                                                        | `""`,`villen`,`einfamilienhaeuser`,`zweifamilienhaeuser`,`mehrfamilienhaeuser`,`reihenhaeuser`,`wohnblocks`                                                                   |
| gewerbliche_nutzung1         | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"` **AND** `umgebungsbebauung1`=`gewerbliche_nutzung`           | `""`                                                                                                        | `""`,`buero_und_geschaeftshaeuser`,`buerogebaeude`,`geschaeftshaeuser`,`landwirtschaftsgebaeude`                                                                              |
| mischnutzung1                | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"` **AND** `umgebungsbebauung1`=`mischnutzung`                  | `""`,`wohn_und_geschaeftshaeuser`                                                                           |                                                                                                                                                                               |
| unbebaut1                    | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"` **AND** `umgebungsbeauung1`=`unbebaut`                       | `""`,`landwirtschaftlich`,`forstwirtschaftlich`                                                             |                                                                                                                                                                               |
| bauweise1                    | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"`                                                            | `keine_angabe`                                                                                              | `keine_angabe`,`offen`,`geschlossen`,`teils`                                                                                                                                  |
| umgebungsbebauung2           | dropdown   | optional but dependend: <br> `umgebungsbebauung1`!=`"keine_angabe"`                                                            | `keine_angabe`                                                                                              | `keine_angabe`,`wohnwirtschaftliche_nutzung`,`gewerbliche_nutzung`,`mischnutzung`,`unbebaut`                                                                                  |
| wohnwirtschaftliche_nutzung2 | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"` **AND** `umgebungsbebauung2`=`wohnwirtschaftliche_nutzung`   | `""`,`villen`,`einfamilienhaeuser`,`zweifamilienhaeuser`,`mehrfamilienhaeuser`,`reihenhaeuser`,`wohnblocks` |                                                                                                                                                                               |
| gewerbliche_nutzung2         | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"` **AND** `umgebungsbebauung2`=`gewerbliche_nutzung`           | `""`                                                                                                        | `""`,`buero_und_geschaeftshaeuser`,`buerogebaeude`,`geschaeftshaeuser`,`landwirtschaftsgebaeude`                                                                              |
| mischnutzung2                | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"` **AND** `umgebungsbebauung2`=`mischnutzung`                  | `""`                                                                                                        | `""`,`wohn_und_geschaeftshaeuser`                                                                                                                                             |
| unbebaut2                    | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"` **AND** `umgebungsbebauung2`=`unbebaut`                      | `""`                                                                                                        | `""`,`landwirtschaftlich`,`forstwirtschaftlich`                                                                                                                               |
| bauweise2                    | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"`                                                            | `keine_angabe`                                                                                              | `keine_angabe`,`offen`,`geschlossen`,`teils`                                                                                                                                  |
| nutzungsverhaeltnis_slider   | dropdown   | optional but dependend: <br> `umgebungsbebauung2`!=`"keine_angabe"`                                                            | `3`                                                                                                         | [umgebungsbebauung1] `1`,`2`,`3`,`4`,`5` [umgebungsbebauung2]![grafik](https://user-images.githubusercontent.com/44137948/136636046-38be1431-7f49-40fa-9eff-6ace813a853a.png) |
|                              |            |                                                                                                                                |                                                                                                             |                                                                                                                                                                               |

#### 6. Parkplatzsituation:
Parkplatzsituation-options can always be used independent of the chosen `objektkategorie`:
| Property                | Input-Type | Mandatory?                                               | Default | Possible Values                                                                                          |
|:----------------------- |:---------- |:-------------------------------------------------------- |:------- |:-------------------------------------------------------------------------------------------------------- |
| parkplatzsituation      | dropdown   | optional                                                 | `""`    | `""`,`entspannt`,`leicht_angespannt`,`angespannt`                                                        |
| begruendung_lage        | dropdown   | optional                                                 | `""`    | `""`,`periphere_lage`,`laendliche_lage`,`randlage`,`zentrale_lage`                                       |
| begruendung_straße      | dropdown   | optional                                                 | `""`    | `""`,`fussgaengerzone`,`sackgasse`,`spielstrasse`,`durchgangsstrasse`,`hauptstrasse`,`hauptverkehrsader` | 
| stellplaetze            | dropdown   | optional                                                 | `""`    | `""`,`keine_vorhanden`,`auswahl`                                                                         |
| stellplaetze_aussen     | textfield  | optional but dependend: <br> `stellplaetze`==`"auswahl"` |         |                                                                                                          |
| stellplaetze_carport    | textfield  | optional but dependend: <br> `stellplaetze`==`"auswahl"` |         |                                                                                                          |
| stellplaetze_garage     | textfield  | optional but dependend: <br> `stellplaetze`==`"auswahl"` |         |                                                                                                          |
| stellplaetze_tiefgarage | textfield  | optional but dependend: <br> `stellplaetze`==`"auswahl"` |         |                                                                                                          |

#### <a name="naherholung"></a>7. Naherholungsmöglichkeiten:
Naherholungsmöglichkeiten-options can only be used if one of the follwing `objektkategorie` is chosen: `betreutes_wohnen`, `doppelhaushaelfte`, `eigentumswohnung`, `einfamilienhaus`, `einfamilienhaus_mit_gewerbe`, `fluechtlingsheim`, `mehrfamilienhaus`, `mikroappartment`, `pflegeheim`, `plattenbau`, `rehaklinik_kurklinik`, `reihenendhaus`, `reihenmittelhaus`, `studentenwohnheim`, `wohn_und_geschaeftshaus`, `wohnanlage`, `wohnheim`, `zweifamilienhaus`, `appartmenthaus_boardinghaus`, `ferienwohnung_wochenendhaus`, `gastronomiebetrieb`, `hotel`, `pension` ([Overview](#overview)).
| Property                         | Input-Type | Mandatory?                                                                     | Default        | Possible Values                                                                                                                      |
|:-------------------------------- |:---------- |:------------------------------------------------------------------------------ |:-------------- |:------------------------------------------------------------------------------------------------------------------------------------ |
| naherholungsmoeglichkeit_art1    | dropdown   | optional                                                                       | `keine_angabe` | `keine_angabe`,`keine_verfuegbar`,`gruenflaechen`,`sport_freizeitanlage`,`erholungsgebiet`,`parkanlage`,`gewaesser`,`wald`,`gebirge` |
| naherholungsmoeglichkeit_name1_1 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_art1`!=`"keine_angabe"` |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name1_2 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name1_1`!=`""`          |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name1_3 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name1_2`!=`""`          |                |                                                                                                                                      |
| naherholungsmoeglichkeit_art2    | dropdown   | optional but dependend: <br> `naherholungsmoeglichkeit_art1`!=`"keine_angabe"` | `keine_angabe` | `keine_angabe`,`gruenflaechen`,`sport_freizeitanlage`,`naturschutzgebiet`,`parkanlage`,`gewaesser`,`wald`,`gebirge`                  |
| naherholungsmoeglichkeit_name2_1 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_art2`!=`"keine_angabe"` |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name2_2 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name2_1`!=`""`          |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name2_3 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name2_2`!=`""`          |                |                                                                                                                                      |
| naherholungsmoeglichkeit_art3    | dropdown   | optional but dependend: <br> `naherholungsmoeglichkeit_art2`!=`"keine_angabe"` | `keine_angabe` | `keine_angabe`,`gruenflaechen`,`sport_freizeitanlage`,`naturschutzgebiet`,`parkanlage`,`gewaesser`,`wald`,`gebirge`                  |
| naherholungsmoeglichkeit_name3_1 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_art3`!=`"keine_angabe"` |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name3_2 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name3_1`!=`""`          |                |                                                                                                                                      |
| naherholungsmoeglichkeit_name3_3 | textfield  | optional but dependend: <br> `naherholungsmoeglichkeit_name3_2`!=`""`          |                |                                                                                                                                      |

#### <a name="aerzte"></a>8. Ärztliche Primärversorgung:
Ärztliche-Primärversorgung-options can only be used if one of the follwing `objektkategorie` is chosen: `betreutes_wohnen`, `doppelhaushaelfte`, `eigentumswohnung`, `einfamilienhaus`, `einfamilienhaus_mit_gewerbe`, `fluechtlingsheim`, `mehrfamilienhaus`, `mikroappartment`, `pflegeheim`, `plattenbau`, `rehaklinik_kurklinik`, `reihenendhaus`, `reihenmittelhaus`, `studentenwohnheim`, `wohn_und_geschaeftshaus`, `wohnanlage`, `wohnheim`, `zweifamilienhaus` ([Overview](#overview)).
 
| Property                     | Input-Type | Mandatory? | Default | Possible Values                | 
|:---------------------------- |:---------- |:---------- |:------- |:------------------------------ |
| aerztliche_primaerversorgung | dropdown   | optional   | `""`    | `""`,`gegeben`,`nicht_gegeben` |

#### <a name="aperiodisch"></a>9. Aperiodischer Bedarf:
Aperiodischer Bedarf options can only be used if one of the follwing `objektkategorie` is chosen: `betreutes_wohnen`, `doppelhaushaelfte`, `eigentumswohnung`, `einfamilienhaus`, `einfamilienhaus_mit_gewerbe`, `fluechtlingsheim`, `mehrfamilienhaus`, `mikroappartment`, `pflegeheim`, `plattenbau`, `rehaklinik_kurklinik`, `reihenendhaus`, `reihenmittelhaus`, `studentenwohnheim`, `wohn_und_geschaeftshaus`, `wohnanlage`, `wohnheim`, `zweifamilienhaus` ([Overview](#overview)).
 
| Property             | Input-Type | Mandatory? | Default | Possible Values                                                 |
|:-------------------- |:---------- |:---------- |:------- |:--------------------------------------------------------------- |
| aperiodischer_bedarf | dropdown   | optional   | `""`    | `""`,`vollstaendig`,`weitestgehend`,`teilweise`, `unzureichend` | 

#### <a name="wohnlage"></a>10. Wohnlage:
Wohnlage options can only be used if one of the follwing `objektkategorie` is chosen: `betreutes_wohnen`, `doppelhaushaelfte`, `eigentumswohnung`, `einfamilienhaus`, `einfamilienhaus_mit_gewerbe`, `fluechtlingsheim`, `mehrfamilienhaus`, `mikroappartment`, `pflegeheim`, `plattenbau`, `rehaklinik_kurklinik`, `reihenendhaus`, `reihenmittelhaus`, `studentenwohnheim`, `wohn_und_geschaeftshaus`, `wohnanlage`, `wohnheim`, `zweifamilienhaus` ([Overview](#overview)).
 
| Property          | Input-Type | Mandatory?                                           | Default | Possible Values                     |
|:----------------- |:---------- |:---------------------------------------------------- |:------- |:----------------------------------- |
| wohnlage_karte    | dropdown   | optional                                             | `""`    | `""`,`einfach`,`mittel`,`gut`,`top` | 
| wohnlage_anwender | dropdown   | optional but dependend: <br>  `wohnlage_karte`!=`""` |         | `einfach`,`mittel`,`gut`,`sehr_gut` |

#### 11. Fazit:
Fazit options can always be used independent of the chosen `objektkategorie`:
| Property                    | Input-Type | Mandatory? | Default | Possible Values                                     |
|:--------------------------- |:---------- |:---------- |:------- |:--------------------------------------------------- |
| fazit_verkehrsinfrastruktur | dropdown   | optional   | `""`    | `""`,`sehr_gut`,`gut`,`durchschnittlich`,`schlecht` |
| fazit_mikrolage             | dropdown   | optional   | `""`    | `""`,`sehr_gut`,`gut`,`durchschnittlich`,`schlecht` | 

***
### Optional api settings parameters:
The following two options are not for text modification but internal api options to enhance request-time or to display referred POIs on a map: 
| Property      | Explanation                                                                        | Mandatory? | Default | Possible Values     |
|:------------- |:---------------------------------------------------------------------------------- |:---------- |:------- |:------------------- |
| auto_analysis | see [b) Advanced Integration](#adv) for more information                           | optional   | `""`    | `""`,`false`,`true` | 
| data          | returns coordinates to visualise points of interests on which the text is based on | optional   | `""`    | `""`,`false`,`true` |
| language      | returns text in the requested language                                             | optional   | `""`    | `""`,`DE`,`EN`,`ES` |

***
### <a name="overview"></a>Overview of textvariants depending on requestparameter `objektkategorie`:
It is not always essential or worthwhile to provide all data for a full text generation. The returned text will only contain information that are necessary depending on the chosen `objektkategorie`. The table down below shows which `objektkategorie` will return information concerning the different topics:

| Objektkategorie                                           | Grundtext | [Aperiodischer Bedarf](#aperiodisch) | [Ärztliche Primär- versorgung](#aerzte) | [Naherholungs- möglichkeiten](#naherholung) | [Wohnlage](#wohnlage) |
|:--------------------------------------------------------- |:--------- |:------------------------------------ |:--------------------------------------- |:------------------------------------------- |:--------------------- |
| `abbaugrundstueck`                                        | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `aerztehaus`                                              | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `akutkrankenhaus`                                         | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `appartmenthaus_boardinghaus`                             | &#10003;  | &#10005;                             | &#10005;                                | &#10003;                                    | &#10005;              |
| `ausbildungsstaette`                                      | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `ausstellungsgebaeude`                                    | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `autohaus`                                                | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `autohof`                                                 | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `badebetrieb`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `baumarkt`                                                | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `betreutes_wohnen`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `buero_und_geschaeftshaus`                                | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `buerogebaeude`                                           | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `doppelhaushaelfte`                                       | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `eigentumswohnung`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `einfamilienhaus_mit_einliegerwohnung`                    | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `einfamilienhaus_mit_gewerbe`                             | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `einfamilienhaus`                                         | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `einkaufszentrum`                                         | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `fachmarktzentrum`                                        | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `ferienwohnung_wochenendhaus`                             | &#10003;  | &#10005;                             | &#10005;                                | &#10003;                                    | &#10005;              |
| `fitnesscenter`                                           | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `fluechtlingsheim`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `freizeitanlage`                                          | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `garagengebaeude`                                         | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `gastronomiebetrieb`                                      | &#10003;  | &#10005;                             | &#10005;                                | &#10003;                                    | &#10005;              |
| `geschaeftshaus`                                          | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `gewerbepark`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `golfplatz`                                               | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `handwerksbetrieb`                                        | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `hochregallager`                                          | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `hotel`                                                   | &#10003;  | &#10005;                             | &#10005;                                | &#10003;                                    | &#10005;              |
| `kaufhaus_warenhaus`                                      | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `kindergarten`                                            | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `kinderheim`                                              | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `kino`                                                    | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `krankenhaus`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `lagergebaeude`                                           | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `landwirtschaftliche_hofstelle`                           | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `landwirtschaftliches_forstwirtschaftliches_ grundstueck` | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `landwirtschaftsgebaeude`                                 | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `logistikzentrum`                                         | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `medizinisches_versorgungszentrum`                        | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `mehrfamilienhaus`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `mikroappartment`                                         | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `moebelmarkt`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `parkhaus`                                                | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `parkplatz`                                               | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `pension`                                                 | &#10003;  | &#10005;                             | &#10005;                                | &#10003;                                    | &#10005;              |
| `pflegeheim`                                              | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `plattenbau`                                              | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `produktionsgebaeude`                                     | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `rehaklinik_kurklinik`                                    | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `reihenendhaus`                                           | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `reihenmittelhaus`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `reiterhof`                                               | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `resthof`                                                 | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `sb_markt`                                                | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `schule`                                                  | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `sonstige_gewerbeimmobilie`                               | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `sonstige_industrieimmobilie`                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `studentenwohnheim`                                       | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `tankstelle`                                              | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `teileigentum`                                            | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `tiefgarage`                                              | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `unbebautes_grundstueck`                                  | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `veranstaltungshalle_kulturelle_einrichtung`              | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `verbrauchermarkt`                                        | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `verkehrsbau`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `waschanlage`                                             | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `werkstattgebaeude`                                       | &#10003;  | &#10005;                             | &#10005;                                | &#10005;                                    | &#10005;              |
| `wohn_und_geschaeftshaus`                                 | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `wohnanlage`                                              | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `wohnheim`                                                | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |
| `zweifamilienhaus`                                        | &#10003;  | &#10003;                             | &#10003;                                | &#10003;                                    | &#10003;              |


***
### Examples
* [GET-Request: Easy Integration (1 Request)](examples/mikro-api-001-easy-1request.md)
* [GET-Request: Advanced Integration (2 Requests)](examples/mikro-api-002-advanced-2requests.md)
