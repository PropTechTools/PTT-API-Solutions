# GET-Request: Mikrolage - Advanced Integration (2 Requests)

## 1 Request

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/microlage/json?apiKey=<apikey>&name=<name>&requester=<customer>&textlength=short&bewertungsobjekt=50.771279,6.085676&stadtzentrum=50.775396,6.086234&objektkategorie=1&aerztliche_primaerversorgung=gegeben&aperiodischer_bedarf=vollstaendig&auto_analysis=false`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | `apikey` | 
| name     | `name` |
| requester     | customer |
| bewertungsobjekt     | 47.8415313,8.8581662 |
| stadtzentrum     | 47.8415313,8.8581662 |
| objektkategorie     | 1 |
| aerztliche_primaerversorgung     | gegeben |
| aperiodischer_bedarf     | vollstaendig |
| auto_analysis     | true |

## 2 Request

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/microlage/json?apiKey=<apikey>&name=<name>&requester=<customer>&textlength=short&bewertungsobjekt=50.771279,6.085676&stadtzentrum=50.775396,6.086234&objektkategorie=1&inneroertliche_lage=teil&umgebungsbebauung1=wohnwirtschaftliche_nutzung&bauweise1=geschlossen&wohnlage_karte=gut&wohnlage_anwender=gut&fazit_mikrolage=gut&fazit_verkehrsanbindung=gut&auto_analysis=true`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | `apikey` | 
| name     | `name` |
| requester     | customer |
| bewertungsobjekt     | 47.8415313,8.8581662 |
| stadtzentrum     | 47.8415313,8.8581662 |
| objektkategorie     | 1 |
| inneroertliche_lage     | teil |
| umgebungsbebauung1     | wohnwirtschaftliche_nutzung |
| bauweise1     | geschlossen |
| wohnlage_karte     | gut |
| wohnlage_anwender     | gut |
| fazit_verkehrsanbindung     | gut |
| fazit_mikrolage     | gut |
| auto_analysis     | false |


## Success Response 1 (auto_analysis = true) [10 sec]

**Code** : `200 OK`

**Content examples**


```json
{
    "success": true,
    "message": "",
    "data": {
        "html_text": "",
        "mikrolage": {
            "ueberschrift":"",
            "inneroertliche_lage":"",
            "umgebungsbebauung":"",
            "laermbelastung":"",
            "versorgungsinfrastruktur":"Als Oberzentrum profitiert Aachen <...> auch die ärztliche Primärversorgung vor Ort gegeben.",
            "naherholung":"",
            "parkplatzsituatiion":"",
            "wohnlage":"",
            "fazit":""
        },
        "verkehrsinfrastruktur": {
            "ueberschrift":"",
            "individualverkehrsanbindung_allgemein":"Aachen ist über die Bundesstraßen B1 <...> angeschlossen.",
            "autobahnanschluss":"Die vom Objektstandort ausgehend nächstgelegene Auffahrt zur <...> der Anschlussstelle 'Aachen-Europaplatz'.",
            "oepnv_lokal":"Sowohl die Bushaltestelle 'Alter Posthof' als auch der u.a. als ICE-Haltestelle <...>  gut erreichbar ist.",
            "oepnv_ueberregional":"Die Distanz zum internationalen Verkehrsflughafen 'Düsseldorf' <...> rd. 74 km.",
            "fazit":""
        }
    }
}
```

## Success Response 2 (auto_analysis = false) [2 sec]

**Code** : `200 OK`

**Content examples**


```json
{
    "success": true,
    "message": "",
    "data": {
        "html_text": "",
        "mikrolage": {
            "ueberschrift":"Erläuterungen zur Mikrolage",
            "inneroertliche_lage":"Das Bewertungsobjekt befindet <...> von Aachen.",
            "umgebungsbebauung":"Die Umgebungsbebauung <...> geschlossener Bauweise aus.",
            "laermbelastung":"",
            "versorgungsinfrastruktur":"Als Oberzentrum profitiert Aachen <...> auch die ärztliche Primärversorgung vor Ort gegeben.",
            "naherholung":"Bedingt durch die Nähe zu einem Gewässer ( <...> im Umfeld der Immobilie.",
            "parkplatzsituatiion":"",
            "wohnlage":"Gemäß dem Capital Immobilien Kompass <...> vor Ort entspricht.",
            "fazit":"Für die vorliegende Nutzung wird die Mikrolage insgesamt als gut beurteilt."
        },
        "verkehrsinfrastruktur": {
            "ueberschrift":"Erläuterungen zur Mikrolage",
            "individualverkehrsanbindung_allgemein":"",
            "autobahnanschluss":"",
            "oepnv_lokal":"",
            "oepnv_ueberregional":"",
            "fazit":"Unter Berücksichtigung der genannten Faktoren liegt somit eine gute Verkehrsinfrastruktur vor."
        }
    }
}
```

## Error Response

**Code** : `400 Bad Request`

```json
{
    "success": false,
    "message": "<error-message>",
    "data": { 
    }
}
```