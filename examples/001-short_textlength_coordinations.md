# GET-Request: Short Textlength with coordinations

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/macrolage/json?apiKey=<apikey>&latlng=48.4171645,10.6796138&name=<name>&requester=<customer>&textlength=short`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | `apikey` | 
| latlng     | 48.4171645,10.6796138 |
| name     | `name` |
| requester     | customer |
| textlength     | short |

#### Success Response

**Code** : `200 OK`

**Content examples**


```json
{
    "success": true,
    "message": "",
    "data": {
        "html_text": "<b>Erläuterungen zur Makrolage: <...> Stand: Februar 2019).",
        "ueberschrift": "Erläuterungen zur Makrolage",
        "absatz1": "Der Markt Zusmarshausen  <...> Landeshauptstadt München.",
        "absatz2": " Zusmarshausen beherbergt  <...> eines Mittelzentrums.",
        "absatz3": " Zusmarshausen wird  <...> Stand: Februar 2019)."
    }
}
```