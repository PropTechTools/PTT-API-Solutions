[<- back to overview](README.md)
***

## III) PTT-Kartenset-API
The "kartenset" module enables the processing request of map material.

***
### Requestparameters

| Property 	| Explanation 	| Mandatory? 	| Default 	|Possible Values 	| 
|:---	|:---	|:---	|:---	|:---	|
| responseType	|  -> `data`: returning map-images base64 decoded <br> -> `doc`: returning a word-document | <b>obligatory</b> | -| `data`,`doc`|
| border	|  displays border of local community | optional | -| `true`,`false`|
| compass	|  displays compass on map | optional | -| `true`,`false`|
| scale	|  displays scale on map | optional | -| `true`,`false`|


**Attention:** If `compass=true` and `scale=true` are used in compination with `responseType=data` (Base64-Format) the api will return one seperate base64 decoded compass image and three scale images. The returned map images (map-overview, map-city, map-details) must be kept at response resolution (600x790) otherwise the scale does not fit the map.

</br>

***
### Optional pois on maps
To display pois on the map the poi data from [PTT-Mikrolage-API](https://github.com/PropTechTools/PTT-API-Solutions/blob/master/ptt-mikro-api.md#optional-api-settings-parameters)-Response
can be used by adding `data=true` to the Mikrolage-Request.



| Property 	| Explanation 	| Mandatory? 	| Default 	|Possible Values 	| 
|:---	|:---	|:---	|:---	|:---	|
| supermarkt	|  -> `data`: returning map-images base64 decoded <br> -> `doc`: returning a word-document | <b>obligatory</b> | -| `<[lat,lng],[lat,lng]...>` |
| restaurant	|  displays all requested pois of this type | optional | -| `<[lat,lng],[lat,lng]...>` |
| einkaufszentrum	|  displays all requested pois of this type  | optional | -| `<[lat,lng],[lat,lng]...>`|
| autobahnanschluss	|  displays all requested autobahnanschluss | optional | -| `<[lat,lng],[lat,lng]...>`|
| bushaltestelle	|  displays all requested pois of this type | optional | -| `<[lat,lng],[lat,lng]...>`|
| bahnhof |  displays all requested pois of this type  | optional | -| `<[lat,lng],[lat,lng]...>`|
| flughafen	|  displays all requested pois of this type | optional | -| `<[lat,lng],[lat,lng]...>`|

</br>

***
### Examples

* [GET-Request: Kartenset-Data](examples/kartenset-api-001-doc.md)
