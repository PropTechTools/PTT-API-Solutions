# GET-Request: Kartenset-Imagedata

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/kartenset/json?apiKey=<apikey>&name=<name>&requester=<customer>&latlng=47.8415313,8.8581662&responseType=data`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | `apikey` | 
| name     | `name` |
| requester     | customer |
| latlng     | 47.8415313,8.8581662 |
| responseType     | data |

## Success Response

**Code** : `200 OK`

**Content examples**


```json
{
    "success": true,
    "message": "",
    "data": {
        "address":{
            "ZIP":"65326",
            "city":"Aarbergen",
            "number":"2"},
        "copyright": "OpenStreetMap contributors",
        "map-city": "<base64 decoded>",
        "map-details": "<base64 decoded>",
        "map-overview": "<base64 decoded>"
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