# GET-Request: Mikrolage - Easy Integration (1 Request)

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/microlage/json?apiKey=gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU&name=sYp4kEAtyUnH67K1&requester=test@proptechtools.de&latlng=47.8415313,8.8581662&objektkategorie=1&inneroertliche_lage=teil&fussgaengerzone=false&separiert=false&randlage=false&geografische_besonderheiten_praezisierung_gewaesser=bach&umgebungsbebauung1=wohnwirtschaftliche_nutzung&bauweise1=geschlossen&umgebungsbebauung2=keine_angabe&bauweise2=keine_angabe&nutzungsverhaeltnis_slider=3&aerztliche_primaerversorgung=gegeben&aperiodischer_bedarf=vollstaendig&wohnlage_karte=gut&wohnlage_anwender=gut&fazit_mikrolage=gut&fazit_verkehrsanbindung=gut&`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU | 
| name     | sYp4kEAtyUnH67K1 |
| requester     | test@proptechtools.de |
| latlng    | 47.8415313,8.8581662 |
| objektkategorie     | einfamilienhaus |
| inneroertliche_lage     | teil |
| umgebungsbebauung1     | wohnwirtschaftliche_nutzung |
| bauweise1     | geschlossen |
| aerztliche_primaerversorgung     | gegeben |
| aperiodischer_bedarf     | vollstaendig |
| wohnlage_karte     | gut |
| wohnlage_anwender     | gut |
| fazit_verkehrsanbindung     | gut |
| fazit_mikrolage     | gut |

## Success Response

**Code** : `200 OK`

**Content examples**


```json
{
    "success": true,
    "message": "",
    "data": {
        "html_text": "<b>Erläuterungen zur Mikrolage: <...> somit eine <u>gut</u> Verkehrsinfrastruktur vor.",
        "mikrolage": {
            "ueberschrift":"Erläuterungen zur Mikrolage",
            "inneroertliche_lage":"Das Bewertungsobjekt befindet <...> von Aachen.",
            "umgebungsbebauung":"Die Umgebungsbebauung <...> geschlossener Bauweise aus.",
            "laermbelastung":"",
            "versorgungsinfrastruktur":"Als Oberzentrum profitiert Aachen <...> auch die ärztliche Primärversorgung vor Ort gegeben.",
            "naherholung":"Bedingt durch die Nähe zu einem Gewässer ( <...> im Umfeld der Immobilie.",
            "parkplatzsituation":"",
            "wohnlage":"Gemäß dem Capital Immobilien Kompass <...> vor Ort entspricht.",
            "fazit":"Für die vorliegende Nutzung wird die Mikrolage insgesamt als gut beurteilt."
        },
        "verkehrsinfrastruktur": {
            "ueberschrift":"Erläuterungen zur Mikrolage",
            "individualverkehrsanbindung_allgemein":"Aachen ist über die Bundesstraßen B1 <...> angeschlossen.",
            "autobahnanschluss":"Die vom Objektstandort ausgehend nächstgelegene Auffahrt zur <...> der Anschlussstelle 'Aachen-Europaplatz'.",
            "oepnv_lokal":"Sowohl die Bushaltestelle 'Alter Posthof' als auch der u.a. als ICE-Haltestelle <...>  gut erreichbar ist.",
            "oepnv_ueberregional":"Die Distanz zum internationalen Verkehrsflughafen 'Düsseldorf' <...> rd. 74 km.",
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
