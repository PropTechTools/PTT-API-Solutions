# GET-Request: Short Textlength with coordinations

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/macrolage/json?apiKey=gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU&latlng=47.8415313,8.8581662&name=sYp4kEAtyUnH67K1&requester=test@proptechtools.de&objektkategorie=einfamilienhaus&textlength=short`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU | 
| name     | sYp4kEAtyUnH67K1 |
| requester     | test@proptechtools.de |
| latlng    | 47.8415313,8.8581662 |
| objektkategorie     | einfamilienhaus |
| textlength     | short |

## Success Response

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