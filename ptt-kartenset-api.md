[<- back to overview](README.md)
***

## III) PTT-Kartenset-API

### Mandatory parameters

* apiKey (your private api key)
* name (your username for the PTT API)
* latlng 
* ResponseType `<data | doc>`<br>
   -> doc: returning a word-document<br>
   -> data: returning map-images base64 decoded

### Optional parameters
 * address (address analysis based on coordinates is overwritten by optional address)

### Examples

* [GET-Request: Kartenset-Data](examples/kartenset-api-001-data.md)

### Web-testing-environment 
The PTT-Kartenset-API can also be tested here: [https://api.proptechtools.de/kartenset-api.php](https://api.proptechtools.de/kartenset-api.php).