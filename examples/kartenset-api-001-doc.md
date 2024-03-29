# GET-Request: Kartenset-Imagedata

**BASE-URL**: https://www.proptechapi.de

**URL** : `/dte/kartenset/json?apiKey=gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU&name=sYp4kEAtyUnH67K1&requester=test@proptechtools.de&latlng=47.8415313,8.8581662&objektkategorie=einfamilienhaus&responseType=doce`

**Method** : `GET`

**Parameters** : 

| parameter        | value         
| ------------- |:-------------:| 
| apiKey     | gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU | 
| name     | sYp4kEAtyUnH67K1 |
| requester     | test@proptechtools.de |
| latlng    | 47.8415313,8.8581662 |
| objektkategorie     | einfamilienhaus |
| responseType     | doc |


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
        "map-overview": "<base64 decoded>",
        "map-city": "<base64 decoded>",
        "map-details": "<base64 decoded>",
        "compass": "<base64 decoded>",
        "scale": {
            "map-overview": "<base64 decoded>",
            "map-city": "<base64 decoded>",
            "map-details": "<base64 decoded>"}
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
