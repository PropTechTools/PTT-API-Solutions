[<- back to overview](README.md)
***

## III) PTT-Kartenset-API

### Obligatory parameters
* latlng: `<lat,lng>`
* ResponseType: `<data | doc>`<br>
   -> data: returning map-images base64 decoded <br>
   -> doc: returning a word-document<br>

### Optional settings parameters

 * address: (automated address analysis based on coordinates is overwritten by optional address)
 * border: `<true | false | "">` (displays border of local community)
 * compass: `<true | false | "">` (displays compass)
 * scale: `<true | false | "">` (displays scale)
 
**Attention:** If `compass=true` and `scale=true` are used in compination with `ResponseType=data` (Base64-Format) the api will return one seperate base64 decoded compass image and three scale images. The returned map images (map-overview, map-city, map-details) must be kept at response resolution (600x790) otherwise the scale does not fit the map.

### Optional pois on maps
To display pois on the map the poi data from [PTT-Mikrolage-API](https://github.com/PropTechTools/PTT-API-Solutions/blob/master/ptt-mikro-api.md#optional-api-settings-parameters)-Response
can be used by adding `data=true` to the Mikrolage-Request.

 * supermarkt: `<[lat,lng],[lat,lng]...>` (displays supermarkt on map)
 * restaurant: `<[lat,lng],[lat,lng]...>` (displays restaurant on map)
 * einkaufszentrum: `<[lat,lng],[lat,lng]...>` (displays einkaufszentrum on map)
 * autobahnanschluss: `<[lat,lng],[lat,lng]...>` (displays autobahnanschluss on map)
 * bushaltestelle: `<[lat,lng],[lat,lng]...>` (displays bushaltestelle on map)
 * bahnhof: `<[lat,lng],[lat,lng]...>` (displays bahnhof on map)
 * flughafen: `<[lat,lng],[lat,lng]...>` (displays flughafen on map)

### Examples

* [GET-Request: Kartenset-Data](examples/kartenset-api-001-data.md)

### Web-testing-environment 
The PTT-Kartenset-API can also be tested here: [https://api.proptechtools.de/kartenset-api.php](https://api.proptechtools.de/kartenset-api.php).
