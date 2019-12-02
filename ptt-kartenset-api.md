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

### Web-testing-environment 
The PTT-Kartenset-API can also be tested with this [web testing environment](https://api.proptechtools.de/kartenset-api.php).