# GET-Request: Longt textlength with address

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/macrolage/json?apiKey=<apikey>&communityKey=072355007001&name=<name>&requester=<customer>&textlength=long&fazit=sehr_gut`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | `apikey` | 
| communityKey     | 072355007001 |
| name     | `name` |
| requester     | customer |
| textlength     | long |
| fazit     | sehr_gut  |

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